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

                <h2>新增标签</h2>

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
                    {{ Form::open(array('action' => 'LabelController@save', 'id' => 'create-label', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) }}

                    <fieldset>

                        <section>
                            <label class="label">标签名称</label>
                            <label class="input">
                                {{ Form::text('name', $label->name , array('class' => 'input-sm', 'maxlength' => '50')) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">图片</label>
                            <div class="input input-file">
                                <span class="button">{{ Form::file('icon', array('id' => 'file', 'onchange' => 'this.parentNode.nextSibling.value = this.value')) }}上传标签图</span><input name="iconValue" type="text" value="{{ $label->icon }}" placeholder="Include some files" readonly="">
                            </div>
                        </section>

                        <section>
                            <label class="label">描述</label>
                            <label class="input">
                                {{ Form::text('description', $label->description, array('class' => 'input-sm', 'maxlength' => '200')) }}
                            </label>
                        </section>

                        <input type="hidden" name="id" value="{{ $label->id }}">
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
        var $createCategory = $("#create-label").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                name : {
                    required : '必须输入菜品名称'
                }
            },

            // Ajax form submition
            submitHandler : function(form) {
                form.submit();
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    })

</script>

@stop