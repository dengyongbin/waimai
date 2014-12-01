@extends('admin.base')
@section('content-main')
<div class="row">

<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

    <!-- Widget ID (each widget will need unique ID)-->

    <!-- end widget -->

    <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1"
         data-widget-editbutton="false" role="widget" style="">
        <!-- widget options:
        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

        data-widget-colorbutton="false"
        data-widget-editbutton="false"
        data-widget-togglebutton="false"
        data-widget-deletebutton="false"
        data-widget-fullscreenbutton="false"
        data-widget-custombutton="false"
        data-widget-collapsed="true"
        data-widget-sortable="false"

        -->
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

            <h2>配送区域</h2>
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
                <div class="tree smart-form">
                    <ul role="tree">
                        <li class="parent_li" role="treeitem">
                            <span class="bttnhover" title="Collapse this branch"><i class="fa fa-lg fa-folder-open"></i>北京市<span
                                    style="display: none">
                                            <button class="btn btn-xs btn-default"
                                                    onclick=" nodeview('*',0,'北京市')">
                                                <i class="fa fa-plus"></i>
                                            </button></span></span>
                            <ul role="group">
                                @foreach ($areas as $area)
                                @if ($area->parent==0)
                                <li class="parent_li" role="treeitem">
                                        <span class="bttnhover" title="Collapse this branch"> <i
                                                class="fa fa-lg fa-minus-circle"></i><input
                                                type="hidden" value="{{$area->id}}"/>{{$area->name}}<code></code>
                                            <span style="display: none">
                                            <button class="btn btn-xs btn-default"
                                                    onclick="nodeview('*',{{ $area->id }},'{{$area->name}}')">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <button class="btn btn-xs btn-default"
                                                onclick="nodeview({{$area->id}},0,'北京市')">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                             <button class="btn btn-xs btn-default"
                                                     onclick="deleteit({{$area->id}})">
                                                 <i class="fa fa-times"></i>
                                             </button></span></span>
                                    @if ($area->items)
                                    <ul role="group">
                                        @foreach ($area->items as $item)
                                        <li style="display: list-item;">
                                             <span class="bttnhover"> <label>
                                                     {{$item->name}}<code></code>
                                                     <span style="display: none">
                                                     <button class="btn btn-xs btn-default"
                                                             onclick="nodeview('*',{{ $item->id }},'{{$item->name}}')">
                                                         <i class="fa fa-plus"></i>
                                                     </button>
                                                     <button class="btn btn-xs btn-default"
                                                         onclick="nodeview({{$item->id}},{{$item->id}},'{{ $item->name}}')">
                                                         <i class="fa fa-pencil"></i>
                                                     </button>
                                                     <button class="btn btn-xs btn-default"
                                                             onclick="deleteit({{$item->id}})">
                                                         <i class=" fa fa-times"></i></button>
                                                 </label></span> </span>

                                            @if ($item->items)
                                            <ul role="group">
                                                @foreach ($item->items as $item3)
                                                <li style="display: list-item;">
                                                    <span class="bttnhover"> <label>
                                                     {{$item3->name}}<code></code>
                                                     <span class="bttn" style="display: none">
                                                     <button class="btn btn-xs btn-default"
                                                             onclick="nodeview('*',{{ $item3->id }},'{{$item3->name}}')">
                                                         <i class="fa fa-plus"></i>
                                                     </button>
                                                     <button
                                                         class="btn btn-xs btn-default"
                                                         data-original-title="Edit Row"
                                                         onclick="nodeview({{$item3->id}},{{$item3->id}},'{{ $item3->name }}')">
                                                         <i class="fa fa-pencil"></i>
                                                     </button>
                                                     <button class="btn btn-xs btn-default"
                                                             data-original-title="Cancel"
                                                             onclick="deleteit({{$item3->id}})">
                                                         <i class=" fa fa-times"></i></button>
                                                        </label>
                                                     </span>
                                                    </span>

                                                    @if ($item3->items)
                                                    <ul role="group">
                                                        @foreach ($item3->items as $item4)
                                                        <li style="display: list-item;">
                                                    <span class="bttnhover"> <label>
                                                            {{$item4->name}}<code></code>
                                                     <span class="bttn" style="display: none">
                                                         <button class="btn btn-xs btn-default"
                                                             data-original-title="Edit Row"
                                                             onclick="nodeview({{$item4->id}},{{$item4->id}},'{{ $item4->name }}')">
                                                             <i class="fa fa-pencil"></i>
                                                         </button>
                                                     <button class="btn btn-xs btn-default"
                                                             data-original-title="Cancel"
                                                             onclick="deleteit({{$item4->id}})">
                                                         <i class=" fa fa-times"></i></button>
                                                        </label></span> </span>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif

                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif

                                        </li>

                                        @endforeach
                                    </ul>
                                    @endif

                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>

                    </ul>
                </div>

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
</article>
<script type="text/javascript">
    $(":checkbox").click(function () {
        var menuid = $("#menu_id");
        if ($(this).is(':checked')) {
            menuid.val(menuid.val() + ',' + $(this).next().val());
        } else {
            menuid.val(menuid.val().replace(',' + $(this).next().val(), ''));
        }
    });
</script>
<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    $(document).ready(function () {
        pageSetUp();
        // PAGE RELATED SCRIPTS
        $('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
        $('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Collapse this branch').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(':visible')) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
            }
            e.stopPropagation();
        });

    })
</script>
<script type="text/javascript">
    $('.bttnhover').hover(function () {
        $($(this).find('span')).show();
    }, function () {
        $($(this).find('span')).hide();
    });
    function deleteit(id) {
        if (confirm("确认删除该节点吗？")) {
            location = "/admin/area/delete/" + id;
        }
    }
    function nodeview(id, parent, name) {
        location = '/admin/area/node/' + id + "/" + parent + '/' + name;
    }
</script>


</div>
@stop