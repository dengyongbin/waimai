@extends('admin.base')
@section('content-main')
<div class="row">

    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-x" data-widget-colorbutton="false"
             data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false"
             data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false"
             role="widget" style="">

            <header role="heading">
                <span class="widget-icon"> <i class="fa fa-align-justify"></i> </span>

                <h2>添加文章</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                    {{ Form::open(array('action' => 'ArticleController@saveArticle','id' => 'create-category', 'class'
                    =>
                    'smart-form', 'enctype' => 'multipart/form-data')) }}
                    <div class="alert alert-info no-margin fade in">
                        <button type="submit" class="btn btn-primary">
                            保存
                        </button>
                        <button type="button" class="btn btn-primary"
                                onclick="location='{{{ URL::to('/admin/article/category/all') }}}';">
                            返回
                        </button>
                    </div>
                    <div class="table-responsive">

                        <fieldset>
                            <fieldset>
                                <div class="row">
                                    {{ Form::hidden('id', $article->id ) }}
                                    <section class="col col-3">
                                        <label class="input"> <i class="icon-prepend fa fa-file-text-o"></i>
                                            {{ Form::text('title', $article->title ,array('placeholder'=>'标题')) }}
                                        </label>
                                    </section>
                                    <section class="col col-3">
                                        <label class="select">
                                            <i></i>{{ Form::select('category_id', $categorys, $article->category_id) }}
                                        </label>
                                    </section>
                                    <section class="col col-3">
                                        <div class="input input-file">
                                            <span class="button">{{ Form::file('photo', array('id' => 'file', 'onchange' => 'this.parentNode.nextSibling.nextSibling.value = this.value')) }}选择</span><i
                                                class="icon-prepend fa fa-file-image-o"></i><input type="text"
                                                                                                   name="photoValue"
                                                                                                   placeholder="选取文件"
                                                                                                   value="{{ $article->photo }}"
                                                                                                   readonly="">
                                        </div>
                                    </section>
                                </div>

                                <div class="row">

                                    <section class="col col-9">
                                        <label class="input"> <i class="icon-prepend fa fa-comment-o"></i>
                                            {{ Form::text('summary', $article->summary ,array('placeholder'=>'文章摘要')) }}
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-9">
                                        <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
                                        <textarea name="ckeditor"> {{ $article->content }}</textarea>
                                    </section>
                                </div>
                            </fieldset>

                    </div>
                    {{ Form::close() }}
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
    </article>
    <!-- WIDGET END -->

    <!-- <script type="text/javascript" charset="utf-8" src="{{{asset('assets/uediter/ueditor.config.js') }}}"></script>
     <script type="text/javascript" charset="utf-8" src="{{{asset('assets/uediter/ueditor.all.min.js')}}}"></script>
     <script type="text/javascript" charset="utf-8" src="{{{asset('assets/uediter/lang/zh-cn/zh-cn.js')}}}"></script>-->
    <script type="text/javascript" charset="utf-8" src="{{{asset('assets/js/plugin/ckeditor/ckeditor.js') }}}"></script>
    <script type="text/javascript">
        /*     var ue = UE.getEditor('editor');*/
        $(document).ready(function () {
            CKEDITOR.replace('ckeditor', { height: '380px', startupFocus: true});
        })
    </script>


</div>
@stop
