<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-17
 * Time: 下午3:04
 */
class Comment extends Eloquent
{
    protected $table = 'article_comments';
    protected $guarded = array('created_at', 'updated_at');
    protected $softDelete = true;

}