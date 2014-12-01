@extends('admin.base')

@section('content-main')

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>

                <h2>菜品列表 </h2>

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

                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>编号</th>
                            <th>菜品名称</th>
                            <th>排序</th>
                            <th>价格</th>
                            <th>打包费</th>
                            <th>每日数量</th>
                            <th>图片</th>
                            <th>标签</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($goods as $key => $good)
                        <tr>
                            <td>{{{ $key + 1 }}}</td>
                            <td>{{{ $good->id }}}</td>
                            <td>{{{ $good->name }}}</td>
                            <td>{{{ $good->sort }}}</td>
                            <td>{{{ $good->price }}}</td>
                            <td>{{{ $good->packing_price }}}</td>
                            <td>{{{ $good->daily_number }}}</td>
                            <!--<td>{{{ $good->thumbnail }}}</td>-->
                            <td><img src="{{{ $good->thumbnail }}}" width="50px" height="50px"/></td>
                            <td>
                                @foreach ($good->label as $label)
                                <img src="{{{ $label->icon }}}" width="20px" height="20px"/>
                                @endforeach
                            </td>
                            <td>{{{ $good->created_at }}}</td>
                            <td>
                                <button id="editBtn" type="button" onclick="location='{{{ URL::to('admin/good/edit/'.$good->id) }}}';">编辑</button>
                                <button id="deleteBtn" type="button" value="{{{ $good->id }}}">删除</button>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->
    </article>
</div>

@stop


@section('load-page-related-plugins')

<script src="{{{ asset('assets/js/plugin/datatables/jquery.dataTables.min.js') }}}"></script>
<script src="{{{ asset('assets/js/plugin/datatables/dataTables.colVis.min.js') }}}"></script>
<script src="{{{ asset('assets/js/plugin/datatables/dataTables.tableTools.min.js') }}}"></script>
<script src="{{{ asset('assets/js/plugin/datatables/dataTables.bootstrap.min.js') }}}"></script>
<script src="{{{ asset('assets/js/plugin/datatable-responsive/datatables.responsive.min.js') }}}"></script>

@stop

@section('append-script-on-ready')

<script>
    $(document).ready(function () {

        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        $('#dt_basic').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        var table = $('#dt_basic').DataTable();
        $('#dt_basic tbody').on( 'click', 'button:nth-child(2)', function () {
            if(confirm("确定删除吗")){
                var deleteBtn = $(this);
                $.post( "{{{ URL::to('admin/good/delete') }}}",{id:$(this).val()}, function (data) {
                    table.row( deleteBtn.parents('tr') ).remove().draw();
                    $("#content > div:nth-child(1)").after("<div class='alert alert-block alert-success'>" +
                        "<a class='close' data-dismiss='alert' href='#'>×</a><h4 class='alert-heading'>" +
                        "<i class='fa fa-info-circle'></i> 操作提示</h4><p>删除成功</p></div>");
                });
            }
        });
        /* END BASIC */
    })

</script>
@stop