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

                <h2>新增菜品</h2>

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
                    {{ Form::open(array('action' => 'AdminGoodController@create', 'id' => 'create-good', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) }}

                    <fieldset>

                        <section>
                            <label class="label">菜品名称</label>
                            <label class="input">
                                {{ Form::text('name', $good->name , array('class' => 'input-sm', 'maxlength' => '20')) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">菜品分类</label>
                            <label class="select">
                                {{ Form::select('good_category', $goodCategorys , $good->category_id) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">排序</label>
                            <label class="input">
                                {{ Form::text('sort', $good->sort, array('class' => 'input-sm', 'maxlength' => '8')) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">价格</label>
                            <label class="input">
                                {{ Form::text('price', $good->price, array('class' => 'input-sm', 'maxlength' => '8')) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">打包费</label>
                            <label class="input">
                                {{ Form::text('packing_price', $good->packing_price, array('class' => 'input-sm', 'maxlength' => '8')) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">每日数量</label>
                            <label class="input">
                                {{ Form::text('daily_number', $good->daily_number, array('class' => 'input-sm', 'maxlength' => '8')) }}
                            </label>
                        </section>

                        <section>
                            <label class="label">图片</label>
                            <div class="input input-file">
                                <span class="button">{{ Form::file('thumbnail', array('id' => 'file', 'onchange' => 'this.parentNode.nextSibling.value = this.value')) }}上传菜品图</span><input name="thumbnailValue" type="text" value="{{ $good->thumbnail }}" placeholder="Include some files" readonly="">
                            </div>
                        </section>

                        <section>
                            <label class="label">标签图片</label>
                            <div class="inline-group">
                                @foreach ($labels as $label)
                                <label class="checkbox">
                                    {{ Form::checkbox('label_ids[]', $label->id, in_array($label->id, $label_ids)) }}
                                    <i></i><img src="{{ $label->icon }}" width="20px" height="20px"/>
                                </label>
                                @endforeach
                            </div>
                        </section>

                        <section>
                            <label class="label">描述</label>
                            <label class="input">
                                {{ Form::text('description', $good->description, array('class' => 'input-sm', 'maxlength' => '200')) }}
                            </label>
                        </section>

                        <input type="hidden" name="id" value="{{ $good->id }}">
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
        var $createCategory = $("#create-good").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                },
                sort : {
                    digits : true
                },
                price : {
                    required : true,
                    number : true
                },
                daily_price : {
                    required : true,
                    number : true
                }
            },

            // Messages for form validation
            messages : {
                name : {
                    required : '必须输入菜品名称'
                },
                sort : {
                    digits : '必须是数字'
                },
                price : {
                    required : '必须输入价格',
                    number : '必须输入合法的数字'
                },
                daily_price : {
                    required : '必须输入打包价格',
                    number : '必须输入合法的数字'
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