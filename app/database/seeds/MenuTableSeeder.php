<?php

class MenuTableSeeder extends Seeder {

    /**
     * Run the user table seeds.
     *
     * @return void
     */
    public function run() {

        Menu::truncate();

        $menus = array (
            array(
                'title' => '主面板',
                'url' => '/admin/dashboard',
                'view' => 'admin.dashboard',
                'icon' => 'fa-home'
            ),
            array(
                'title' => '用户管理',
                'icon' => 'fa-bar-chart-o',
                'menuItems' => array(
                    array(
                        'title' => '用户列表',
                        'url' => '/admin/user/list',
                        'view' => 'admin.user.list'
                    ),
                    array(
                        'title' => '禁用列表',
                        'url' => '/admin/user/listDisabled',
                        'view' => 'admin.user.disabled'
                    )
                )
            ),
            array(
                'title' => '订单管理',
                'icon' => 'fa-pencil-square-o',
                'menuItems' => array(
                    array(
                        'title' => '所有订单',
                        'url' => '/admin/category/listPublished',
                        'view' => 'admin.category.published'
                    ),
                    array(
                        'title' => '待审核订单',
                        'url' => '/admin/category/create',
                        'view' => 'admin.category.create'
                    ),
                    array(
                        'title' => '待发货订单',
                        'url' => '/admin/category/create',
                        'view' => 'admin.category.create'
                    ),
                    array(
                        'title' => '订单统计',
                        'url' => '/admin/category/create',
                        'view' => 'admin.category.create'
                    ),
                    array(
                        'title' => '订单结算',
                        'url' => '/admin/category/create',
                        'view' => 'admin.category.create'
                    ),
                    array(
                        'title' => '历史订单',
                        'url' => '/admin/category/create',
                        'view' => 'admin.category.create'
                    )
                )
            ),
            array(
                'title' => '菜单管理',
                'icon' => 'fa-pencil-square-o',
                'menuItems' => array(
                    array(
                        'title' => '菜单列表',
                        'url' => '/admin/category/listPublished',
                        'view' => 'admin.category.published'
                    ),
                    array(
                        'title' => '新增菜单',
                        'url' => '/admin/category/create',
                        'view' => 'admin.category.create'
                    )
                )
            ),
            array(
                'title' => '商家管理',
                'icon' => 'fa-table',
                'menuItems' => array(
                    array(
                        'title' => '商家列表',
                        'url' => '/admin/tweet/listPublished',
                        'view' => 'admin.tweet.published'
                    ),
                    array(
                        'title' => '新增商家',
                        'url' => '/admin/tweet/create',
                        'view' => 'admin.tweet.create'
                    )
                )
            ),
            array(
                'title' => '积分管理',
                'icon' => 'fa-calendar',
                'menuItems' => array(
                    array(
                        'title' => '积分列表',
                        'url' => '/admin/contribution/listReviewed',
                        'view' => 'admin.contribution.reviewed'
                    ),
                    array(
                        'title' => '新增积分',
                        'url' => '/admin/contribution/listFailed',
                        'view' => 'admin.contribution.failed'
                    )
                )
            ),
            array(
                'title' => '评论管理',
                'icon' => 'fa-reply',
                'menuItems' => array(
                    array(
                        'title' => '评论列表',
                        'url' => '/admin/comment/list',
                        'view' => 'admin.comment.list'
                    )
                )
            ),
            array(
                'title' => '菜品管理',
                'icon' => 'fa-inbox',
                'menuItems' => array(
                    array(
                        'title' => '菜品列表',
                        'url' => '/admin/good/list',
                        'view' => 'admin.good.list'
                    ),
                    array(
                        'title' => '新增菜品',
                        'url' => '/admin/good/create',
                        'view' => 'admin.good.create'
                    )
                )
            ),
            array(
                'title' => '菜品分类管理',
                'icon' => 'fa-list-alt',
                'menuItems' => array(
                    array(
                        'title' => '菜品分类列表',
                        'url' => '/admin/goodCategory/list',
                        'view' => 'admin.goodCategory.list'
                    ),
                    array(
                        'title' => '新增菜品分类',
                        'url' => '/admin/goodCategory/create',
                        'view' => 'admin.goodCategory.create'
                    )
                )
            ),
            array(
                'title' => '管理员帐号',
                'icon' => 'fa-desktop',
                'menuItems' => array(
                    array(
                        'title' => '管理员列表',
                        'url' => '/admin/account/list',
                        'view' => 'admin.account.list'
                    ),
                    array(
                        'title' => '添加管理员',
                        'url' => '/admin/account/create',
                        'view' => 'admin.account.create'
                    ),
                    array(
                        'title' => '修改密码',
                        'url' => '/admin/account/password',
                        'view' => 'admin.account.password'
                    )
                )
            ),
            array(
                'title' => '运营管理',
                'icon' => 'fa-folder-open',
                'menuItems' => array(
                    array(
                        'title' => '创建版本',
                        'url' => '/admin/version/create',
                        'view' => 'admin.version.create'
                    ),
                    array(
                        'title' => '待发布版本',
                        'url' => '/admin/version/listCreated',
                        'view' => 'admin.version.created'
                    ),
                    array(
                        'title' => '已发布版本',
                        'url' => '/admin/version/listPublished',
                        'view' => 'admin.version.published'
                    ),
                    array(
                        'title' => '推送管理',
                        'url' => '/admin/operator/push',
                        'view' => 'admin.operator.push'
                    )
                )
            ),
            array(
                'title' => '系统设置',
                'icon' => 'fa-windows',
                'menuItems' => array(
                    array(
                        'title' => '配置项',
                        'url' => '/admin/system/settings',
                        'view' => 'admin.system.settings'
                    ),
                    array(
                        'title' => '退出',
                        'url' => '/admin/system/exit'
                    )
                )
            )
        );


        $topLevelIndex = 1;
        $secondLevelIndex = 100;
        foreach ($menus as $menu) {
            Menu::create(array(
                'id' => $topLevelIndex,
                'title' => $menu['title'],
                'icon' => $menu['icon'],
                'url' => array_key_exists('url', $menu) ? $menu['url'] : "#",
                'view' => array_key_exists('view', $menu) ? $menu['view'] : "#"
            ));
            if (isset($menu['menuItems'])) {
                foreach ($menu['menuItems'] as $item) {
                    Menu::create(array(
                        'id' => $secondLevelIndex++,
                        'parent' => $topLevelIndex,
                        'title' => $item['title'],
                        'url' => $item['url'],
                        'view' => array_key_exists('view', $item) ? $item['view'] : "#"
                    ));
                }
            }
            $topLevelIndex++;
        }
    }
}
