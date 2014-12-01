<?php

/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-19
 * Time: 下午1:28
 */
class AdminController extends Controller
{

    /**
     * Get the menus array with the current view path
     *
     * @param $viewPath
     * @return mixed
     */
    protected function getMenus($viewPath)
    {
        $permissions = $this->getUserPermissions();
        $arr = explode(',', $permissions);
        $menus = Menu::whereParent(0)->whereUsed(0)->orderBy('sort', 'asc')->get();
        foreach ($menus as &$menu) {
            if ($menu->view === $viewPath) {
                $menu['active'] = true;
            }
            $items = Menu::whereParent($menu->id)->whereUsed(0)->orderBy('sort', 'asc')->get();
            if (!is_null($items) && count($items) > 0) {
                $menu['items'] = $items;
                foreach ($items as &$item) {
                    if (strrpos($viewPath, $item['view']) !== false) {
                        $item['active'] = true;
                        $menu['open'] = true;
                    }
                    if (in_array($item['id'], $arr)) {
                        $item['show'] = true;
                    }
                }
            }
        }
        return $menus;
    }


    /**
     * Make view with the specified view path & compact
     *
     * @param $viewPath
     * @param $compact
     * @return mixed
     */
    protected function makeView($viewPath, $compact = NULL)
    {
        $menus = $this->getMenus($viewPath);


        if (is_null($compact)) {
            return View::make($viewPath, compact('menus'));
        } else {
            extract($compact);
            $params = func_get_args();
            array_shift($params);
            array_shift($params);
            array_push($params, 'menus');
            return View::make($viewPath, compact($params));
        }

    }

    protected function getUserPermissions()
    {
        try {
            $userGroup = Session::get('user_group');
            return $permissions = $userGroup[0]->permissions;
        } catch
        (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
    }


}