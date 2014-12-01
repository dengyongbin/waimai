@extends('admin.base')

@section('content-main')

<div class="row">

    <!-- NEW COL START -->
    <article class="col-sm-12 col-md-12 col-lg-6">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false"
             data-widget-custombutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>

                <h2>新增菜品分类</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->
                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                    {{ Form::open(array('action' => 'AdminGoodCategoryController@create', 'id' => 'create-goodCategory', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) }}

                    <fieldset>

                        <section>
                            <label class="label">分类名称</label>
                            <label class="input">
                                {{ Form::text('name', $goodCategory->name , array('class' => 'input-sm', 'maxlength' => '20')) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">排序</label>
                            <label class="input">
                                {{ Form::text('sort', $goodCategory->sort, array('class' => 'input-sm', 'maxlength' => '8')) }}
                            </label>
                        </section>

                        <input type="hidden" name="id" value="{{ $goodCategory->id }}">
                    </fieldset>

                    <footer>
                        <button type="submit" class="btn btn-primary">
                            提交
                        </button>
                        <!--                            <button type="button" class="btn btn-default" onclick="window.history.back();">-->
                        <!--                                Back-->
                        <!--                            </button>-->
                    </footer>
                    {{ Form::close() }}
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->

    </article>
    <!-- END COL -->

</div>

<!-- END ROW -->

@stop


@section('load-page-related-plugins')

<!-- PAGE RELATED PLUGIN(S) -->
<script src="{{{ asset('assets/js/plugin/jquery-form/jquery-form.min.js') }}}"></script>

@stop


@section('append-script-on-ready')

<script type="text/javascript">

    $().ready(function() {
        var $createCategory = $("#create-goodCategory").validate({
            // Rules for form validation
            rules : {
                title : {
                    required : true
                },
                subtitle : {
                    required : true
                },
                sort : {
                    digits : true
                },
                thumbnailValue : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                title : {
                    required : '必须输入类别名'
                },
                subtitle : {
                    required : '必须输入类别子名称'
                },
                sort : {
                    digits : '必须是数字'
                },
                thumbnailValue : {
                    required : '必须选择类别封面图上传'
                }
            },

            // Ajax form submition
            submitHandler : function(form) {
                form.submit();
//                $(form).ajaxSubmit({
//                    success : function() {
//                        $("#create-category").addClass('submited');
//                    }
//                });
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    })

</script>

@stop