<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-7
 * Time: 上午11:35
 */
class Gift extends Eloquent
{
    protected $table = 'gifts';
    protected $guarded = array('created_at', 'updated_at');
    protected $softDelete = true;

}