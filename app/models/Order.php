<?php
/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-23
 * Time: 下午4:03
 */
class Order extends Eloquent {
    protected $table = 'orders';
    protected $guarded = array('created_at', 'updated_at');
}