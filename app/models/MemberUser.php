<?php

/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-23
 * Time: 下午4:04
 */
class MemberUser extends Eloquent
{
    protected $table = 'member_users';
    protected $guarded = array('created_at', 'updated_at');
}