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

                <h2>用户组权限设定</h2>

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
                <div class="alert alert-info no-margin fade in">
                    <button class="close" data-dismiss="alert">
                        ×
                    </button>
                    <!-- <i class="fa-fw fa fa-info"></i>-->
                    <!--Adds zebra-striping to table row within <code>&lt;table&gt;</code> by adding the--><!--
                        <code>.table-striped</code>
                        with the base class-->

                    <form id="groupPms" role="form" action="/admin/group/pms/save">

                        <button type="button" class="btn btn-primary"
                                onclick="location='{{{ URL::to('/admin/group/all') }}}';">
                            返回
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交
                        </button>
                        （组名称： {{$name}}  ）
                        <input name="group_id" type="hidden" value="{{ $group_id}}">
                        <input id="menu_id" name="menu_id" type="hidden" value="{{$menu_id}}">
                    </form>


                </div>
                <div class="tree smart-form">
                    <ul role="tree">
                        <li class="parent_li" role="treeitem">
                            <span title="Collapse this branch"><i class="fa fa-lg fa-folder-open"></i> 根目录</span>
                            <ul role="group">
                                @foreach ($allmenus as $menu)
                                @if ($menu->parent==0)
                                <li class="parent_li" role="treeitem">
                                        <span title="Collapse this branch"> <i class="fa fa-lg fa-minus-circle"></i><!--<input type="checkbox"
                                                                                   name="checkbox-inline">--><input
                                                type="hidden" value="{{$menu->id}}"/>{{$menu->title}}</span>
                                    @if ($menu->items)
                                    <ul role="group">
                                        @foreach ($menu->items as $item)
                                        <li style="display: list-item;">
                                                                     <span> <label>
                                                                             @if ($item->active)
                                                                             <input type="checkbox"
                                                                                    name="checkbox-inline"
                                                                                    checked="checked">
                                                                             @else
                                                                             <input type="checkbox"
                                                                                    name="checkbox-inline">
                                                                             @endif
                                                                             <input
                                                                                 type="hidden" value="{{$item->id}}"/>
                                                                             <i></i>{{$item->title}}</label> </span>
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
<script type="application/javascript">
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


</div>
@stop