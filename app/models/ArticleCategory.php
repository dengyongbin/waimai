<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-11
 * Time: 下午4:59
 */
class ArticleCategory extends Eloquent
{
    protected $table = 'article_categorys';
    protected $guarded = array('created_at', 'updated_at');
    protected $softDelete = true;

}