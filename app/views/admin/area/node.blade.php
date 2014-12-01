@extends('admin.base')
@section('content-main')
<div class="row">

<!-- NEW WIDGET START -->
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

    <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1"
         data-widget-editbutton="false" role="widget" style="">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu"><a href="javascript:void(0);"
                                                           class="button-icon jarviswidget-toggle-btn" rel="tooltip"
                                                           title="" data-placement="bottom"
                                                           data-original-title="Collapse"><i
                        class="fa fa-minus "></i></a> <a href="javascript:void(0);"
                                                         class="button-icon jarviswidget-fullscreen-btn"
                                                         rel="tooltip" title="" data-placement="bottom"
                                                         data-original-title="Fullscreen"><i
                        class="fa fa-expand "></i></a>
                <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title=""
                   data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
            <div class="widget-toolbar" role="menu"><a data-toggle="dropdown"
                                                       class="dropdown-toggle color-box selector"
                                                       href="javascript:void(0);"></a>
                <ul class="dropdown-menu arrow-box-up-right color-select pull-right">
                    <li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip"
                              data-placement="left" data-original-title="Green Grass"></span></li>
                    <li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark"
                              rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li>
                    <li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight"
                              rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li>
                    <li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip"
                              data-placement="top" data-original-title="Purple"></span></li>
                    <li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta"
                              rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li>
                    <li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip"
                              data-placement="right" data-original-title="Pink"></span></li>
                    <li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark"
                              rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li>
                    <li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight"
                              rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li>
                    <li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip"
                              data-placement="top" data-original-title="Teal"></span></li>
                    <li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip"
                              data-placement="top" data-original-title="Ocean Blue"></span></li>
                    <li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark"
                              rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li>
                    <li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip"
                              data-placement="right" data-original-title="Night"></span></li>
                    <li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip"
                              data-placement="left" data-original-title="Day Light"></span></li>
                    <li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip"
                              data-placement="bottom" data-original-title="Orange"></span></li>
                    <li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark"
                              rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li>
                    <li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip"
                              data-placement="bottom" data-original-title="Red Rose"></span></li>
                    <li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight"
                              rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li>
                    <li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip"
                              data-placement="right" data-original-title="Purity"></span></li>
                    <li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle=""
                           rel="tooltip" data-placement="bottom"
                           data-original-title="Reset widget color to default">Remove</a>
                    </li>
                </ul>
            </div>
            <span class="widget-icon"> <i class="fa fa-table"></i> </span>

            <h2>编辑配送区域</h2>
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
                {{ Form::open(array('action' => 'AreaController@save', 'id' => 'create-area', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) }}

                    <div class="table-responsive">
                        <fieldset>
                            {{ Form::hidden('id', $node->id, array('class' => 'input-sm')) }}
                            {{ Form::hidden('parent', $node->parent, array('class' => 'input-sm')) }}
                            <!--<section>
                                <label class="label">上级区域</label>
                                <label class="input">
                                    {{ Form::text('parent_name', $name, array('class' => 'input-sm', 'disabled' => 'true')) }}
                                </label>
                            </section>-->
                            <section>
                                <label class="label">区域名称</label>
                                <label class="input">
                                    {{ Form::text('name', $node->name, array('class' => 'input-sm', 'maxlength' => '50')) }}
                                </label>
                            </section>
                            <section>
                                <label class="label">拼音</label>
                                <label class="input">
                                    {{ Form::text('pinyin', $node->pinyin, array('class' => 'input-sm', 'maxlength' => '20')) }}
                                </label>
                            </section>
                            <section>
                                <label class="label">地址图标</label>
                                <label class="input">
                                    {{ Form::text('icon', $node->icon, array('class' => 'input-sm', 'maxlength' => '50')) }}
                                </label>
                            </section>
                            <section>
                                <label class="label">排序</label>
                                <label class="input">
                                    {{ Form::text('sort', $node->sort, array('class' => 'input-sm', 'maxlength' => '8')) }}
                                </label>
                            </section>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">
                                提交
                            </button>
                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                返回
                            </button>
                        </footer>
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