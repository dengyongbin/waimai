<?php
/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-9-18
 * Time: 下午3:53
 */
class UserTableSeeder extends Seeder {

    public function run()
    {
        Sentry::createUser(array(
                'email' => 'dengyongbin@wm.com',
                'password' => 'dengyongbin',
                'activated' => true
            )
        );
        Sentry::createUser(array(
                'email' => 'yangjian@wm.com',
                'password' => 'yangjian',
                'activated' => true
            )
        );
        Sentry::createUser(array(
                'email' => 'wangyan@wm.com',
                'password' => 'wangyan',
                'activated' => true
            )
        );
        Sentry::createUser(array(
                'email' => 'xueyuanyuan@wm.com',
                'password' => 'xueyuanyuan',
                'activated' => true
            )
        );
    }
}