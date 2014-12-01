<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-10-8
 * Time: 上午10:49
 */
class ThrottleController extends AdminController
{
    private $allthrottleUrl = "/admin/throttle/all";
    private $throttleViewPath = 'admin.throttle.throttle';

    function banUser($id)
    {
        try {
            // Find the user using the user id
            $throttle = Sentry::findThrottlerByUserId($id);

            // Ban the user
            $throttle->ban();
            return Redirect::to($this->allthrottleUrl);
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
    }

    function unbanUser($id)
    {
        try {
            // Find the user using the user id
            $throttle = Sentry::findThrottlerByUserId($id);

            // Unban the user
            $throttle->unBan();
            return Redirect::to($this->allthrottleUrl);
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
    }


    function findAllUserThrottle()
    {
        $throttles = DB::select('select b.email,b.id as uid,a.* from wm_throttle a RIGHT JOIN wm_users b on a.user_id = b.id');
        return $this->makeView($this->throttleViewPath, compact('throttles'), 'throttles');
    }
}