<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-10-10
 * Time: 下午3:32
 */
class PermissionController extends AdminController
{
    private $groupPmViewPath = 'admin.permission.permissions';
    private $groupsUrl = '/admin/group/all';

    function groupPermission($group_id)
    {
        $allmenus = Menu::whereParent(0)->get();
        $group_info = DB::select('select name,permissions from wm_groups where id=' . $group_id);
        $name = $group_info[0]->name;
        $menu_id = $group_info[0]->permissions;
        $arr = explode(',', $group_info[0]->permissions);
        foreach ($allmenus as &$menu) {
            $items = Menu::whereParent($menu->id)->get();
            if (!is_null($items) && count($items) > 0) {
                foreach ($items as &$item) {
                    for ($i = 0; $i < count($arr); ++$i) {
                        if ($item['id'] == $arr[$i]) {
                            $item['active'] = true;
                        }
                    }
                }
                $menu['items'] = $items;
            }
        }

        return $this->makeView($this->groupPmViewPath, compact('group_id', 'name', 'allmenus', 'menu_id'), 'group_id', 'name', 'allmenus', 'menu_id');
    }

    function saveGroupPermission()
    {
        $group_id = Input::get('group_id');
        $menu_id = Input::get('menu_id');
        DB::update('update wm_groups set permissions = ? where id = ?', array($menu_id, $group_id));
        return Redirect::to($this->groupsUrl);
    }
}