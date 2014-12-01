<?php

/**
 * Created by PhpStorm.
 * User: dengyongbin
 * Date: 14-10-13
 * Time: 下午1:35
 */
class AreaController extends AdminController
{
    private $listViewPath = 'admin.area.list';
    private $areasUrl = '/admin/area/list';
    private $nodeViewPath = 'admin.area.node';
    public $html = '';
    private $del_ids = array();
    function lists()
    {
        $areas = Area::where('parent',0)->get();
        $this->tree($areas);
        return $this->makeView($this->listViewPath, compact('areas'), 'areas');
    }

    public function tree($areas) {
        foreach ($areas as $area) {
            $items = Area::where('parent',$area->id)->get();
            if (!is_null($items) && count($items) > 0) {
                $area['items'] = $items;
            }
            $this->tree($items);
        }
    }

    public function delete($area_id)
    {
        array_push($this->del_ids,$area_id);
        $this->getAreaIds($area_id);
        Area::whereIn('id', $this->del_ids)->delete();
        return Redirect::to('/admin/area/list');
    }

    private function getAreaIds($id) {
        $ids = Area::where('parent',$id)->lists('id');
        Log::info($ids);
        foreach ($ids as $id) {
            array_push($this->del_ids,$id);
            $this->getAreaIds($id);
        }
    }

    function node($node_id, $parent_id, $name)
    {
        $node = null;
        if ($node_id != '*') {
            $node = Area::find($node_id);
        } else {
            $node = new Area();
            $node ->parent = $parent_id;
        }
        Log::info($node);
        return $this->makeView($this->nodeViewPath, compact('node', 'name'), 'node', 'name');
    }

    function save()
    {
        $id = Input::get('id');
        $parent = Input::get('parent');
        $name = Input::get('name');
        $pinyin = Input::get('pinyin');
        $icon = Input::get('icon');
        $sort = Input::get('sort');
        $area = null;
        if ($id == '') {
            $maxIdNode = DB::select('select max(id) id from wm_areas where parent =' . $parent);
            $id = $maxIdNode[0]->id;
            if (is_null($id) || empty($id)) {
                $id = $parent * 100;
            }
            $id = $id + 1;
            $area = Area::create(array(
                'id' => $id,
                'parent' => $parent,
                'name' => $name,
                'pinyin' => $pinyin,
                'icon' => $icon,
                'sort' => $sort
            ));
        } else {
            $area = Area::find($id);
            $area->parent = $parent;
            $area->name = $name;
            $area->pinyin = $pinyin;
            $area->icon = $icon;
            $area->sort = $sort;
        }
        $area->save();
        return Redirect::to($this->areasUrl);
    }
}