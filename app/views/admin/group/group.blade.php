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

                <h2>添加用户组</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>


            <!-- end widget div -->
            <div role="content">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <form class="smart-form" role="form" method="get" action="/admin/group/create">
                    <div class="widget-body no-padding">

                        <div class="alert alert-info no-margin fade in">
                            <button type="submit" class="btn btn-primary">
                                提交
                            </button>
                            <button type="button" class="btn btn-default" onclick="location='{{{ URL::to('/admin/group/all') }}}';">
                                返回
                            </button>
                        </div>
                        <div class="table-responsive">
                                <fieldset>

                                    <section>
                                        <label class="label">组名称</label>
                                        <label class="input">
                                            <input type="text" name="name" class="input-xs">
                                        </label>
                                    </section>
                                </fieldset>
                        </div>
                    </div>
                </form>
                <!-- end widget content -->

            </div>
        </div>
    </article>


</div>
@stop