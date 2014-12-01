<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*Route::get('admin/user/list', function () {
    return View::make('admin.user.list');
});

Route::get('admin/login', function () {
    return View::make('admin.login');
});

Route::post('admin/logsubmit', 'LoginController@logSubmit');

Route::get('admin/index', 'LoginController@index');

Route::get('admin/logout','LoginController@logout');

Route::get('admin/myaccount', 'LoginController@getMyaccount');*/

Route::post('/admin/login', 'AdminDashboardController@login');
Route::get('/admin', 'AdminDashboardController@index');

Route::post('/admin/goodCategory/create', 'AdminGoodCategoryController@create');
Route::post('/admin/goodCategory/delete', 'AdminGoodCategoryController@delete');

Route::post('/admin/good/create', 'AdminGoodController@create');
Route::post('/admin/good/delete', 'AdminGoodController@delete');


//后台管理员维护
Route::get('/admin/user/profile', 'UserController@profile');
Route::get('/admin/user/all', 'UserController@findAllUser');
Route::get('/admin/user/add', 'UserController@addUser');
Route::get('/admin/user/delete/{id}', 'UserController@deleteUser')->where('id', '[0-9]+');
Route::get('/admin/user/create', 'UserController@createUser');

//后台管理员禁用
Route::get('/admin/throttle/all', 'ThrottleController@findAllUserThrottle');
Route::get('/admin/throttle/banUser/{id}', 'ThrottleController@banUser')->where('id', '[0-9]+');
Route::get('/admin/throttle/unbanUser/{id}', 'ThrottleController@unbanUser')->where('id', '[0-9]+');

//组管理
Route::get('/admin/group/add', 'GroupController@addGroup');
Route::get('/admin/group/save', 'GroupController@createGroup');
Route::get('/admin/group/all', 'GroupController@findAllGroup');
Route::get('/admin/group/{groupid}', 'GroupController@getGroupUser')->where('groupid', '[0-9]+');
Route::get('/admin/group/user/save', 'GroupController@saveGroupUser');
Route::get('/admin/group/delete/{id}', 'GroupController@deleteGroup')->where('id', '[0-9]+');

//组权限管理
Route::get('/admin/group/pms/{groupid}', 'PermissionController@groupPermission')->where('groupid', '[0-9]+');
Route::get('/admin/group/pms/save', 'PermissionController@saveGroupPermission');

//后台菜单维护
Route::get('/admin/menu/all', 'MenuController@menus');
Route::get('/admin/menu/delete/{id}', 'MenuController@delete')->where('id', '[0-9]+');
Route::get('/admin/menu/node/{id}/{parent}', 'MenuController@node')->where(array('id' => '[0-9*]+', 'parent' => '[0-9]+'));
Route::get('/admin/menu/node/save', 'MenuController@save');

//会员管理
Route::get('/admin/member/all', 'MemberController@findAllMember');
Route::get('/admin/member/delete/{id}', 'MemberController@deleteMember');

//积分管理
Route::get('/admin/score/all', 'ScoreController@findAllByMember');
Route::get('/admin/score/{member_id}', 'ScoreController@findByMember')->where('member_id', '[0-9]+');

//礼品管理及兑换
Route::get('/admin/gift/all', 'GiftController@findAllGifts');
Route::get('/admin/gift/add', 'GiftController@addGift');
Route::post('/admin/gift/save', 'GiftController@saveGift');
Route::get('/admin/gift/delete/{id}', 'GiftController@deleteGift');
Route::get('/admin/gift/{id}', 'GiftController@findById');
Route::get('/admin/gift/exchange/all', 'GiftController@findAllExchanges');

//图表分析
Route::get('/admin/chart/byorder/{type}', 'ChartController@byOrder');
Route::get('/admin/chart/bygoods/{type}', 'ChartController@byGoods');

//文章分类管理
Route::get('/admin/article/category/all', 'ArticleController@findAllCategorys');
Route::get('/admin/article/category/add', 'ArticleController@addCategory');
Route::post('/admin/article/category/save', 'ArticleController@saveCategory');
Route::get('/admin/article/category/{id}', 'ArticleController@findCategoryById')->where('id', '[0-9]+');
Route::get('/admin/article/category/delete/{id}', 'ArticleController@deleteCategory')->where('id', '[0-9]+');

//文章管理
Route::get('/admin/article/all', 'ArticleController@findAllArticles');
Route::get('/admin/article/add', 'ArticleController@addArticle');
Route::post('/admin/article/save', 'ArticleController@saveArticle');
Route::get('/admin/article/delete/{id}', 'ArticleController@deleteArticle')->where('id', '[0-9]+');
Route::get('/admin/article/{id}', 'ArticleController@findArticleById')->where('id', '[0-9]+');
Route::post('/admin/article/upload/', 'EditerUploadController@upload');
//文章评论管理
Route::get('/admin/article/comment/all', 'ArticleController@findAllComments');
Route::get('/admin/article/comment/delete/{id}', 'ArticleController@deleteComment');

//电话订餐
Route::get('/admin/phone/order', 'PhoneOrderController@order');
Route::post('/admin/phone/save', 'PhoneOrderController@addOrder');

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function () {

    Route::get('/dashboard', 'AdminDashboardController@dashboard');
    Route::get('/logout', 'AdminDashboardController@logout');

    Route::post('/good/delete', 'AdminGoodController@delete');

    Route::get('/goodCategory/list', 'AdminGoodCategoryController@lists');
    Route::get('/goodCategory/create', 'AdminGoodCategoryController@create');
    Route::get('/goodCategory/edit/{id}', 'AdminGoodCategoryController@edit');

    Route::get('/good/list', 'AdminGoodController@lists');
    Route::get('/good/create', 'AdminGoodController@create');
    Route::get('/good/edit/{id}', 'AdminGoodController@edit');

    Route::get('/order/allOrder', 'AdminOrderController@allOrder');
    Route::get('/order/todayOrder/{order_status}', 'AdminOrderController@todayOrder');
    Route::get('/order/todayOrder/operation/{id}/{code}', 'AdminOrderController@operation');

    Route::get('/area/list', 'AreaController@lists');
    Route::get('/area/node/{id}/{parent}/{name}', 'AreaController@node')->where(array('id' => '[0-9*]+', 'parent' => '[0-9]+'));
    Route::post('/area/node/save', 'AreaController@save');
    Route::get('/area/delete/{id}', 'AreaController@delete')->where('id', '[0-9]+');

    Route::get('/label/list', 'LabelController@lists');
    Route::get('/label/create', 'LabelController@create');
    Route::get('/label/edit/{id}', 'LabelController@edit');
    Route::post('/label/delete', 'LabelController@delete');
    Route::post('/label/save', 'LabelController@save');
});