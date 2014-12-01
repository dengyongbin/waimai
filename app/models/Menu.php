<?php

/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-19
 * Time: 下午12:06
 */
class Menu extends Eloquent
{
    public $timestamps = false;
    protected $guarded = array('created_at', 'updated_at');
}