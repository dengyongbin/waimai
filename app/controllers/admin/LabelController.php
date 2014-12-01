<?php
/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-11-17
 * Time: 上午10:47
 */
class LabelController extends AdminController {

    private $listViewPath = 'admin.label.list';
    private $createViewPath = 'admin.label.create';

    public function lists() {
        $labels = Label::all();
        return $this->makeView($this->listViewPath, compact('labels'), 'labels');
    }

    public function create() {
        $label = new Label();
        return $this->makeView($this->createViewPath, compact('label'), 'label');
    }

    public function edit($id) {
        $label = Label::find($id);
        return $this->makeView($this->createViewPath, compact('label'), 'label');
    }

    public function delete() {
        $id = Input::get('id');
        Label::destroy($id);
    }

    public function save() {
        $id = Input::get('id');
        $name = Input::get('name');
        $description = Input::get('description');
        $qiniu = \Qiniu\Qiniu::create(array(
            'access_key' => Config::get('wm.qiniu_access_key'),
            'secret_key' => Config::get('wm.qiniu_secret_key'),
            'bucket' => Config::get('wm.qiniu_bucket')
        ));
        $file = Input::file('icon');
        $info = null;
        if ($file) {
            $info = $qiniu->uploadFile($file->getRealPath(), $file->getFilename());
        }
        if($id > 0) {
            $label = Label::find($id);
            $label->name = $name;
            $label->icon = $info != null ? $info->data['url'] : null;
            $label->description = $description;
        } else {
            $label = Label::create(array(
                'name' => $name,
                'icon' => $info != null ? $info->data['url'] : null,
                'description' => $description
            ));
        }
        $label->save();
        return Redirect::to('admin/label/list');
    }
}