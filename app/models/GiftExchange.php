<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-10
 * Time: 上午10:52
 */
class GiftExchange extends Eloquent
{
    protected $table = 'gift_exchanges';
    protected $guarded = array('created_at', 'updated_at');
    protected $softDelete = true;

}