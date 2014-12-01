<?php

class AdminDashboardController extends AdminController
{

    private $dashboardViewPath = 'admin.dashboard';
    private $dashboardUrl = '/admin/dashboard';
    private $loginViewPath = 'admin.login';

    public function dashboard()
    {
        Log::info('login in......');
        return self::makeView($this->dashboardViewPath);
    }

    public function index()
    {
        //return self::makeView($this->loginViewPath);
        return View::make($this->loginViewPath);
    }

    /**
     * 登陆操作
     * @return mixed
     */
    public function login()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        try {
            $user = Sentry::findUserByCredentials(array(
                'email' => $email,
                'password' => $password,
                'activated' => 1
            ));
            Sentry::login($user, false);
            Session::put('user', $user);
            $user_group = DB::select('select a.* from wm_groups a,wm_users_groups b where b.user_id =' . $user->id);
            if (count($user_group) > 0) {
                Session::put('user_group', $user_group);
            }
            return Redirect::to($this->dashboardUrl);
        } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
            Log::info($e);
            echo 'User was not found.';
        }
    }

    /**
     * 注销操作
     * @return mixed
     */
    public function logout()
    {
        Sentry::logout();
        return View::make($this->loginViewPath);
    }

}