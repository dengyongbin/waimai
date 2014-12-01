<?php
/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-23
 * Time: 下午4:04
 */
class GoodCategory extends Eloquent {
    protected $table = 'good_categorys';
    protected $guarded = array('created_at', 'updated_at');
}