<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-11
 * Time: 下午4:52
 */
class ArticleController extends AdminController
{

    private $catgsViewPath = 'admin.article.categorys';
    private $catgViewPath = 'admin.article.category';
    private $catgUrl = '/admin/article/category/all';
    private $articleViewPath = 'admin.article.article';
    private $articlesViewPath = 'admin.article.articles';
    private $articleUrl = '/admin/article/all';
    private $commentsViewPath = 'admin.article.comments';
    private $commentsUrl = '/admin/article/comment/all';

    //文章分类管理================================================
    function findAllCategorys()
    {
        $categorys = ArticleCategory::paginate(10);
        return $this->makeView($this->catgsViewPath, compact('categorys'), 'categorys');
    }

    function deleteCategory($id)
    {
        $category = ArticleCategory::find($id);
        $category->delete();
        return Redirect::to($this->catgUrl);
    }

    function addCategory()
    {
        $category = new ArticleCategory();
        return $this->makeView($this->catgViewPath, compact('category'), 'category');
    }

    function  saveCategory()
    {
        $id = Input::get('id');
        $name = Input::get('name');
        $sort = Input::get('sort');
        $category = null;
        if ($id == '') {
            $id = DB::table('article_categorys')->max('id') + 1;
            $category = ArticleCategory::create(array('id' => $id, 'name' => $name, 'sort' => $sort));
        } else {
            $category = ArticleCategory::find($id);
            $category->name = $name;
            $category->sort = $sort;
        }
        $category->save();
        return Redirect::to($this->catgUrl);
    }

    function  findCategoryById($id)
    {
        $category = ArticleCategory::find($id);
        return $this->makeView($this->catgViewPath, compact('category'), 'category');
    }


    //文章管理================================================
    function addArticle()
    {
        $categorys = DB::table('article_categorys')->select('id', 'name')->get();
        $categorys = array_pluck($categorys, 'name', 'id');
        $article = new Article();
        return $this->makeView($this->articleViewPath, compact('article', 'categorys'), 'article', 'categorys');
    }

    function findAllArticles()
    {
        $articles = Article::paginate(10);
        return $this->makeView($this->articlesViewPath, compact('articles'), 'articles');
    }

    function saveArticle()
    {
        $id = Input::get('id');
        $title = Input::get('title');
        $category_id = Input::get('category_id');
        $summary = Input::get('summary');
        $ckeditor = Input::get('ckeditor');
        $file = Input::file('photo');
        $qiniu = \Qiniu\Qiniu::create(array(
            'access_key' => Config::get('wm.qiniu_access_key'),
            'secret_key' => Config::get('wm.qiniu_secret_key'),
            'bucket' => Config::get('wm.qiniu_bucket')
        ));
        $info = null;
        if ($file) {
            $info = $qiniu->uploadFile($file->getRealPath(), $file->getFilename());
        }
        $article = null;
        if ($id == '') {
            $id = DB::table('articles')->max('id') + 1;
            $article = Article::create(array('id' => $id, 'category_id' => $category_id, 'title' => $title, 'summary' => $summary, 'content' => 'ckeditor', 'photo' => $info != null ? $info->data['url'] : Input::get('photoValue'),));
        } else {
            $article = Article::find($id);
            $article->category_id = $category_id;
            $article->summary = $summary;
            $article->content = $ckeditor;
            $article->photo = $info != null ? $info->data['url'] : Input::get('photoValue');
        }
        $article->save();
        return Redirect::to($this->articleUrl);
    }

    function deleteArticle($id)
    {
        $article = Article::find($id);
        $article->delete();
        return Redirect::to($this->articleUrl);
    }

    function findArticleById($id)
    {
        $article = Article::find($id);
        $categorys = DB::table('article_categorys')->select('id', 'name')->get();
        $categorys = array_pluck($categorys, 'name', 'id');
        return $this->makeView($this->articleViewPath, compact('article', 'categorys'), 'article', 'categorys');
    }

    //评论管理================================================
    function findAllComments()
    {
        $comments = DB::select('SELECT t.id,(SELECT title FROM wm_articles WHERE id = t.article_id) article_name, (SELECT name FROM wm_member_users WHERE id = t.member_id) member_name,t.pid,t.content,t.created_at,t.updated_at,t.deleted_at FROM wm_article_comments t ORDER BY t.created_at DESC;');
        return $this->makeView($this->commentsViewPath, compact('comments'), 'comments');
    }

    function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return Redirect::to($this->commentsUrl);
    }
}