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

                <h2>菜单管理</h2>

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
                            <span class="bttnhover" title="Collapse this branch"><i class="fa fa-lg fa-folder-open"></i> 根目录<span
                                    style="display: none">
                                            <button class="btn btn-xs btn-default"
                                                    onclick=" nodeview('*',0)">
                                                <i class="fa fa-plus"></i>
                                            </button></span></span>
                            <ul role="group">
                                @foreach ($allmenus as $menu)
                                @if ($menu->parent==0)
                                <li class="parent_li" role="treeitem">
                                        <span class="bttnhover" title="Collapse this branch"> <i
                                                class="fa fa-lg fa-minus-circle"></i><!--<input type="checkbox"
                                                                                   name="checkbox-inline">--><input
                                                type="hidden" value="{{$menu->id}}"/>{{$menu->title}}<code>{{$menu->sort}}</code>
                                            <span style="display: none">
                                            <button class="btn btn-xs btn-default"
                                                    onclick="nodeview('*',{{$menu->id}})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <button
                                                class="btn btn-xs btn-default"
                                                onclick="nodeview({{$menu->id}},0)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                             <button class="btn btn-xs btn-default"
                                                     onclick="deleteit({{$menu->id}})">
                                                 <i class="fa fa-times"></i>
                                             </button></span></span>
                                    @if ($menu->items)
                                    <ul role="group">
                                        @foreach ($menu->items as $item)
                                        <li style="display: list-item;">
                                                                     <span class="bttnhover"> <label>

                                                                             {{$item->title}}<code>{{$item->sort}}</code>
                                                                             <span class="bttn" style="display: none"><button
                                                                                     class="btn btn-xs btn-default"
                                                                                     data-original-title="Edit Row"
                                                                                     onclick="nodeview({{$item->id,''}},{{$menu->id}})">
                                                                                     <i
                                                                                         class="fa fa-pencil"></i>
                                                                                 </button>
                                                                             <button class="btn btn-xs btn-default"
                                                                                     data-original-title="Cancel"
                                                                                     onclick="deleteit({{$item->id}})">
                                                                                 <i class=" fa fa-times"></i></button>
                                                                         </label></span> </span>
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
            location = "/admin/menu/delete/" + id;
        }
    }
    function nodeview(id, parent) {
        location = '/admin/menu/node/' + id + "/" + parent;
    }
</script>


</div>
@stop