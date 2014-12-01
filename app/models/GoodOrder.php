<?php

/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-23
 * Time: 下午4:03
 */
class GoodOrder extends Eloquent
{
    protected $table = 'good_orders';
    protected $guarded = array('created_at', 'updated_at');
}