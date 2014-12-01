@extends('admin.base')
@section('content-main')
<section id="widget-grid" class="">
    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

            <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1"
                 data-widget-editbutton="false" role="widget" style="">
                <header role="heading">
                    <span class="widget-icon"> <i class="fa fa-align-justify"></i> </span>

                    <h2>新增礼品</h2>

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
                        {{ Form::open(array('action' => 'GiftController@saveGift','id' => 'create-gift', 'class' =>
                        'smart-form', 'enctype' => 'multipart/form-data')) }}
                        <div class="alert alert-info no-margin fade in">
                            <button type="submit" class="btn btn-primary">
                                保存
                            </button>
                            <button type="button" class="btn btn-primary"
                                    onclick="location='{{{ URL::to('/admin/gift/all') }}}';">
                                返回
                            </button>
                        </div>
                        <div class="table-responsive">

                            <fieldset>
                                <section>
                                    <label class="label">名称</label>
                                    {{ Form::hidden('id', $gift->id,array('class' => 'input-sm', 'maxlength' =>
                                    '128'))}}
                                    <label class="input">
                                        {{ Form::text('title', $gift->title , array('class' => 'input-sm',
                                        'maxlength' => '128')) }}
                                    </label>
                                </section>
                                <section>
                                    <label class="label">图片</label>

                                    <div class="input input-file">
                                        <span class="button">{{ Form::file('photo', array('id' => 'file', 'onchange' => 'this.parentNode.nextSibling.value = this.value')) }}上传礼品图</span><input
                                            name="photoValue" type="text" value="{{ $gift->photo }}"
                                            placeholder="Include some files" readonly="">
                                    </div>
                                </section>
                                <section>
                                    <label class="label">市场价</label>
                                    <label class="input">
                                        {{ Form::text('price', $gift->price , array('class' => 'input-xs',
                                        'maxlength' => '10')) }}
                                    </label>
                                </section>
                                <section>
                                    <label class="label">所需积分</label>
                                    <label class="input">
                                        {{ Form::text('score', $gift->score , array('class' => 'input-xs',
                                        'maxlength' => '10')) }}
                                    </label>
                                </section>
                                <section>
                                    <label class="label">库存</label>
                                    <label class="input">
                                        {{ Form::text('stock', $gift->stock , array('class' => 'input-xs',
                                        'maxlength' => '10')) }}
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