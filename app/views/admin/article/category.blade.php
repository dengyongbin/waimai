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

                <h2>添加文章分类</h2>

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
                    {{ Form::open(array('action' => 'ArticleController@saveCategory','id' => 'create-category', 'class'
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
                            <section>
                                {{ Form::hidden('id', $category->id ) }}
                                <label class="label">名称</label>
                                <label class="input">
                                    {{ Form::text('name', $category->name,array('class'=>'input-xs') ) }}
                                </label>
                            </section>
                            <section>
                                <label class="label">排序</label>
                                <label class="input">
                                    {{ Form::text('sort', $category->sort,array('class'=>'input-xs') ) }}
                                </label>
                            </section>
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


</div>
@stop