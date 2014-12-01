<?php
/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-26
 * Time: 下午2:07
 */
class AdminGoodController extends AdminController {

    private $listViewPath = 'admin.good.list';
    private $createViewPath = 'admin.good.create';

    /**
     * 菜品列表
     * @return mixed
     */
    public function lists() {
        $goods = Good::all();
        foreach ($goods as $key=>$good) {
            $label = GoodLabel::join('labels', 'labels.id' , '=', 'good_labels.label_id')
                ->where('good_id', $good->id)
                ->select('labels.icon')
                ->get();
            $goods[$key]['label'] = $label;
        }
        return $this->makeView($this->listViewPath, compact('goods'), 'goods');
    }

    /**
     * 保存菜品信息
     * @return mixed
     */
    public function create() {
        $goodCategorys = $this->getGoodCategory();
        $labels = $this->getLabel();
        if(Request::isMethod('get')) {
            $good = new Good();
            $label_ids = array();
            return $this->makeView($this->createViewPath, compact('good', 'goodCategorys', 'labels', 'label_ids'), 'good', 'goodCategorys', 'labels', 'label_ids');
        } else {
            $id = Input::get('id');
            $name = Input::get('name');
            $category_id = Input::get('good_category');
            $sort = Input::get('sort');
            $price = Input::get('price');
            $packing_price = Input::get('packing_price');
            $daily_number = Input::get('daily_number');
            $description = Input::get('description');
            $qiniu = \Qiniu\Qiniu::create(array(
                'access_key' => Config::get('wm.qiniu_access_key'),
                'secret_key' => Config::get('wm.qiniu_secret_key'),
                'bucket' => Config::get('wm.qiniu_bucket')
            ));
            $file = Input::file('thumbnail');
            $info = null;
            if ($file) {
                $info = $qiniu->uploadFile($file->getRealPath(), $file->getFilename());
            }
            $label_ids = Input::get('label_ids');
            $good = null;
            if($id > 0) {
                $good = Good::find($id);
                $good->name = $name;
                $good->category_id = $category_id;
                $good->sort = $sort;
                $good->price = $price;
                $good->packing_price = $packing_price;
                $good->daily_number = $daily_number;
                if($info) {
                    $good->thumbnail = $info->data['url'];
                }
                $good->description = $description;
                $good->save();
                $alert = array(
                    'title' => '成功',
                    'content' => '成功编辑菜品信息'
                );
                // 保存菜品标签信息,先删除，再新增
                GoodLabel::where('good_id', '=', $id)->delete();
            } else {
                $good = Good::create(array(
                    'name' => $name,
                    'category_id' => $category_id,
                    'sort' => $sort,
                    'price' => $price,
                    'packing_price' => $packing_price,
                    'daily_number' => $daily_number,
                    'thumbnail' => $info != null ? $info->data['url'] : null,
                    'description' => $description
                ));
                $good->save();
                $alert = array(
                    'title' => '成功',
                    'content' => '成功添加菜品信息'
                );
            }
            // 保存菜品标签信息
            foreach ($label_ids as $label_id) {
                $goodLabel = GoodLabel::create(array(
                    'good_id' => $good->id,
                    'label_id' => $label_id
                ));
            }
            $goodLabel->save();
            return $this->makeView($this->createViewPath, compact('good', 'goodCategorys', 'alert', 'labels', 'label_ids'), 'good', 'goodCategorys', 'alert', 'labels', 'label_ids');
        }
    }

    /**
     * 编辑菜品信息
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        $good = Good::find($id);
        $goodCategorys = $this->getGoodCategory();
        $labels = $this->getLabel();
        $label_ids = GoodLabel::where('good_id', $id)->lists('label_id');
        return $this->makeView($this->createViewPath, compact('good', 'goodCategorys', 'labels', 'label_ids'), 'good', 'goodCategorys', 'labels', 'label_ids');
    }

    /**
     * 删除菜品信息
     */
    public function delete() {
        $id = Input::get('id');
        // 删除菜品
        Good::destroy($id);
        // 删除菜品标签记录
        GoodLabel::where('good_id', '=', $id)->delete();
    }

    /**
     * 获取菜品分类信息
     * @return array
     */
    public function getGoodCategory() {
        // 菜品分类
        $lists = GoodCategory::all();
        $goodCategorys = array();
        foreach ($lists as $goodCategory) {
            $goodCategorys[$goodCategory->id] = $goodCategory->name;
        }
        return $goodCategorys;
    }

    private function getLabel() {
        $labels = Label::all();
        return $labels;
    }
}