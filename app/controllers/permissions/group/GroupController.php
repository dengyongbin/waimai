<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-9-24
 * Time: 下午4:12
 */
class GroupController extends AdminController
{

    private $addGroupViewPath = 'admin.group.group';
    private $groupsViewPath = 'admin.group.groups';
    private $groupsUrl = '/admin/group/all';
    private $groupUserViewPath = 'admin.group.users';

    function addGroup()
    {
        //$this->layout->content = View::make('admin.group.group');
        return $this->makeView($this->addGroupViewPath);
    }

    function createGroup()
    {
        try {
            // Create the group
            $group = Sentry::createGroup(array(
                'name' => Input::get('name'),
                'permissions' => array(
                    "",""
                ),
            ));
            return Redirect::to($this->groupsUrl);
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists';
        }
    }

    function updateGroup()
    {
        try {
            // Find the group using the group id
            $group = Sentry::findGroupById(1);

            // Update the group details
            $group->name = 'Users';
            $group->permissions = array(
                'admin' => 1,
                'users' => 1,
            );

            // Update the group
            if ($group->save()) {
                // Group information was updated
            } else {
                // Group information was not updated
            }
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists.';
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }
    }

    function deleteGroup($id)
    {
        try {
            // Find the group using the group id
            $group = Sentry::findGroupById($id);

            // Delete the group
            $group->delete();
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }
        return Redirect::to($this->groupsUrl);
    }

    function findAllGroup()
    {
        $groups = Sentry::findAllGroups();
        return $this->makeView($this->groupsViewPath, compact('groups'), 'groups');
    }

    function findGroupByID($id)
    {
        try {
            $group = Sentry::findGroupById($id);
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            return 'Group was not found.';
        }
        $this->layout->content = View::make('admin.group.groups')->with('group', $group);
    }

    function findGroupByName()
    {
        try {
            $group = Sentry::findGroupByName('admin');
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }
    }

    function getPermissions()
    {
        try {
            // Find the group using the group id
            $group = Sentry::findGroupById(1);

            // Get the group permissions
            $groupPermissions = $group->getPermissions();
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group does not exist.';
        }
    }

    function getGroupUser($group_id)
    {
        $groupUsers = DB::select('select a.id,a.email,a.created_at,a.updated_at,b.group_id from wm_users a LEFT JOIN wm_users_groups b on a.id = b.user_id and group_id=' . $group_id);
        $groupName = DB::select('select name from wm_groups where id=' . $group_id);
        //print_r($groupName);
        $name = $groupName[0]->name;
        return $this->makeView($this->groupUserViewPath, compact('group_id', 'name', 'groupUsers'), 'group_id', 'name', 'groupUsers');
    }

    function saveGroupUser()
    {
        $group_id = Input::get('group_id');
        $user_id = Input::get('userid');
        $arr = explode(',', $user_id);
        $sql = '';
        DB::delete('delete from wm_users_groups where group_id=' . $group_id);
        /*foreach ($arr as $ar) {
            if (!empty($ar)) {
                $sql += 'insert into wm_users_groups(user_id,group_id) values (' . $ar . ',' . $group_id . ');';
            }
            echo $ar;
        }*/
        for ($i = 0; $i < count($arr) - 1; ++$i) {
            if (!empty($arr[$i])) {
                $sql = 'insert into wm_users_groups values (' . $arr[$i] . ',' . $group_id . '); ';
            }
            DB::insert($sql);
            //echo $arr[$i];
        }
        return Redirect::to($this->groupsUrl);
    }
}