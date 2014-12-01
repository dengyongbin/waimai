<?php
/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-25
 * Time: 下午1:42
 */
class AdminGoodCategoryController extends AdminController {

    private $listViewPath = 'admin.goodCategory.list';
    private $createViewPath = 'admin.goodCategory.create';

    /**
     * 菜品分类列表
     * @return mixed
     */
    public function lists() {
        $goodCategorys = GoodCategory::all();
        return $this->makeView($this->listViewPath, compact('goodCategorys'), 'goodCategorys');
    }

    /**
     * 保存菜品分类
     * @return mixed
     */
    public function create() {
        if(Request::isMethod('get')) {
            $goodCategory = new GoodCategory();
            return $this->makeView($this->createViewPath, compact('goodCategory'), 'goodCategory');
        }else {
            $id = Input::get('id');
            $name = Input::get('name');
            $sort = Input::get('sort');
            // 编辑状态
            if($id > 0) {
                $goodCategory = GoodCategory::find($id);
                $goodCategory->name = $name;
                $goodCategory->sort = $sort;
                $goodCategory->save();
                $alert = array(
                    'title' => '成功',
                    'content' => '成功编辑菜品分类信息'
                );
                return $this->makeView($this->createViewPath, compact('alert', 'goodCategory'), 'alert', 'goodCategory');
            } else {
                // 新增状态
                $goodCategory = GoodCategory::create(array(
                        'name' => $name,
                        'sort' => $sort
                    )
                );
                $goodCategory->save();
                $alert = array(
                    'title' => '成功',
                    'content' => '成功添加菜品分类信息'
                );
                return $this->makeView($this->createViewPath, compact('alert', 'goodCategory'), 'alert', 'goodCategory');
            }
        }
    }

    /**
     * 编辑菜品分类
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        $goodCategory = GoodCategory::find($id);
        return $this->makeView($this->createViewPath, compact('goodCategory'), 'goodCategory');
    }

    /**
     * 删除菜品分类
     */
    public function delete() {
        $id = Input::get('id');
        $goodCategory = GoodCategory::find($id);
        $goodCategory->delete();
    }
}