<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-4
 * Time: 上午10:58
 */
class MemberScores extends Eloquent
{
    protected $table = 'member_scores';
    protected $guarded = array('created_at', 'updated_at');
}