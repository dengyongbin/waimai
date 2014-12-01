<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-10-13
 * Time: 下午1:35
 */
class MenuController extends AdminController
{
    private $menuViewPath = 'admin.menu.menu';
    private $menusUrl = '/admin/menu/all';
    private $nodeViewPath = 'admin.menu.node';

    function menus()
    {
        $allmenus = Menu::whereParent(0)->orderBy('sort', 'asc')->get();
        foreach ($allmenus as &$menu) {
            $items = Menu::whereParent($menu->id)->get();
            if (!is_null($items) && count($items) > 0) {
                $menu['items'] = $items;
            }
        }

        return $this->makeView($this->menuViewPath, compact('allmenus'), 'allmenus');
    }

    function delete($menu_id)
    {
        Log::info($menu_id);
        DB::delete('delete from wm_menus where id=? or parent=?', array($menu_id, $menu_id));
        return Redirect::to($this->menusUrl);
    }

    function node($node_id, $parent_id)
    {
        Log::info('====');
        $node = null;
        if ($node_id != '*') {
            $node = DB::select('select * from wm_menus where id = ' . $node_id);
        } else {
            $node = array(
                0 => (Object)array('id' => '',
                        'parent' => $parent_id,
                        'title' => '',
                        'description' => '',
                        'url' => '',
                        'view' => '',
                        'icon' => '',
                        'used' => '',
                        'sort' => ''));
        }
        $allmenus = Menu::whereParent(0)->whereUsed(0)->orderBy('sort', 'asc')->get();
        return $this->makeView($this->nodeViewPath, compact('node', 'allmenus'), 'node', 'allmenus');
    }

    function save()
    {
        $id = Input::get('id');
        $parent = Input::get('parent');
        $title = Input::get('title');
        $description = Input::get('description');
        $url = Input::get('url');
        $view = Input::get('view');
        $icon = Input::get('icon');
        $used = Input::get('used');
        $sort = Input::get('sort');
        if ($url == '') {
            $url = '#';
        }
        Log::info($used);
        $menu = null;
        if ($id == '') {
            $maxIdNode = DB::select('select max(id) id from wm_menus where parent =' . $parent);
            $id = $maxIdNode[0]->id;
            if (is_null($id) || empty($id)) {
                $id = $parent * 100;
            }
            $id = $id + 1;
            $menu = Menu::create(array(
                'id' => $id,
                'parent' => $parent,
                'title' => $title,
                'description' => $description,
                'url' => $url,
                'view' => $view,
                'icon' => $icon,
                'used' => $used,
                'sort' => $sort
            ));
        } else {
            $menu = Menu::find($id);
            $menu->parent = $parent;
            $menu->title = $title;
            $menu->description = $description;
            $menu->url = $url;
            $menu->view = $view;
            $menu->icon = $icon;
            $menu->used = $used;
            $menu->sort = $sort;
        }

        $menu->save();
        return Redirect::to($this->menusUrl);
    }
}