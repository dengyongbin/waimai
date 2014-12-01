<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-4
 * Time: 上午10:18
 */
class UserController extends AdminController
{
    private $profileViewPath = 'admin.user.profile';
    private $usersViewPath = 'admin.user.users';
    private $userViewPath = 'admin.user.user';
    private $usersUrl = '/admin/user/all';


    function  findAllUser()
    {
        $allUsers = User::all();
        return $this->makeView($this->usersViewPath, compact('allUsers'), 'allUsers');
    }

    function addUser()
    {
        return $this->makeView($this->userViewPath);
    }

    function createUser()
    {
        try {
            $user = Sentry::createUser(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'activated' => true,
            ));

        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            return 'Login field is required.';
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            return 'Password field is required.';
        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            return 'User with this login already exists.';
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            return 'Group was not found.';
        }
        return Redirect::to($this->usersUrl);
    }

    function deleteUser($id)
    {
        try {
            // Find the user using the user id
            $user = Sentry::findUserById($id);

            // Delete the user
            $user->delete();
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
        return Redirect::to($this->usersUrl);
    }

}