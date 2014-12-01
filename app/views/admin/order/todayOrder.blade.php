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

                <h2>当天订单列表 </h2>

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
                    <div class="alert alert-info no-margin fade in">
                        <input id="seetype" type="hidden" value="{{ $order_status }}">
                        <button id="all" name="btpye" type="submit" class="btn btn-default" onclick="location='{{{ URL::to('/admin/order/todayOrder/all') }}}';">
                            所有订单
                        </button>
                        <button id="1" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/order/todayOrder/1') }}}';">
                            待审核订单
                        </button>
                        <button id="2" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/order/todayOrder/2') }}}';">
                            待发货订单
                        </button>
                        <button id="3" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/order/todayOrder/3') }}}';">
                            已发货订单
                        </button>
                        <span style="padding-left: 20px;"><strong id="second_show">秒</strong></span>
                    </div>

                    <table class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>订单号</th>
                            <th>联系人</th>
                            <th>联系电话</th>
                            <th>地址</th>
                            <th>订单价格</th>
                            <th>订单状态</th>
                            <th>下单时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{{ $key + 1 }}}</td>
                            <td>{{{ $order->order_no }}}</td>
                            <td>{{{ $order->contacts }}}</td>
                            <td>{{{ $order->telphone }}}</td>
                            <td>{{{ $order->address }}}</td>
                            <td>{{{ $order->real_price }}}</td>
                            <td>{{{ $enums['ORDER_STATUS'][$order->order_status] }}}</td>
                            <td>{{{ $order->created_at }}}</td>
                            <td>
                                @if ($order->order_status == 1)
                                    <button id="editBtn" type="button" onclick="location='{{{ URL::to('/admin/order/todayOrder/operation/'.$order->id.'/2') }}}';">审核</button>
                                    <button id="editBtn" type="button" onclick="location='{{{ URL::to('/admin/order/todayOrder/operation/'.$order->id.'/6') }}}';">取消</button>
                                @elseif ($order->order_status == 2)
                                    <button id="deleteBtn" type="button" onclick="location='{{{ URL::to('/admin/order/todayOrder/operation/'.$order->id.'/3') }}}';">发货</button>
                                @elseif ($order->order_status == 3)
                                    <button id="deleteBtn" type="button" onclick="location='{{{ URL::to('/admin/order/todayOrder/operation/'.$order->id.'/4') }}}';">完成</button>
                                @elseif ($order->order_status == 4)
                                    <button id="deleteBtn" type="button" onclick="location='{{{ URL::to('/admin/order/todayOrder/operation/'.$order->id.'/5') }}}';">退款</button>
                                @endif
                                <button class="scanBtn" type="button" value="" data="{{{ $key + 1 }}}">查看</button>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="9">
                                <table class="xqOrderlist showdet_{{ $key + 1 }}" width="100%" align="center" border="" cellpadding="0" cellspacing="0" bordercolor="#6596a9" style="display: none;">
                                    <tbody>
                                    <tr align="center">
                                        <td><div><span>支付方式: </span><span>{{{ $enums['PAY_TYPE'][$order->pay_type] }}}</span></div></td>
                                        <td><div><span>配送时间:</span> <span>{{{ $order->delivery_time }}}</span></div></td>
                                        <td colspan="2"><div><span>订单备注: </span><span>{{{ $order->remark }}}</span></div></td>

                                    </tr>

                                    <tr><td colspan="4" style="height:20px;"></td></tr>
                                    <tr align="center">
                                        <td>菜品</td>
                                        <td>单价</td>
                                        <td>
                                            数量
                                        </td>
                                        <td>
                                            总价
                                        </td>
                                    </tr>

                                    @foreach ($good_orders[$order->id] as $good)
                                    <tr align="center">
                                        <td>{{{ $good['good_name'] }}}</td>
                                        <td>{{{ $good['price'] }}}</td>
                                        <td>{{{ $good['number'] }}}</td>
                                        <td>{{{ $good['total_price'] }}}</td>
                                    </tr>
                                    @endforeach

                                    <tr align="center">
                                        <td colspan=" 4">
                                            <span>商品总价：</span>{{{ $order->total_price }}}   &nbsp;&nbsp;&nbsp;
                                            <span>应收金额：</span>{{{ $order->real_price }}}</td>
                                    </tr>
                                    </tbody>
                                </table>
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
                $.post( "{{{ URL::to('admin/goodCategory/delete') }}}",{id:$(this).val()}, function (data) {
                    table.row( deleteBtn.parents('tr') ).remove().draw();
                    $("#content > div:nth-child(1)").after("<div class='alert alert-block alert-success'>" +
                        "<a class='close' data-dismiss='alert' href='#'>×</a><h4 class='alert-heading'>" +
                        "<i class='fa fa-info-circle'></i> 操作提示</h4><p>删除成功</p></div>");
                });
            }
        });


    var intDiff = parseInt(30);//倒计时总秒数量
    window.setInterval(function(){
        $('#second_show').html('<s></s>'+intDiff+'秒');
        intDiff--;
        if(intDiff == 0) {
            location.reload();
        }
    }, 1000);

    var idx = 0;
    var seetype=$('#seetype').val();
    $("button[name='btpye']").each(function(index){
        if(this.id==seetype){
            $(this).attr('class','btn btn-default');
            idx=index;
        }else{
            $(this).attr('class','btn btn-primary');
        }
    });

    $('.xqOrderlist').hide();
    $(".scanBtn").click(function(){
        $(".showdet_"+$(this).attr('data')).toggle();
    });
        /* END BASIC */
    })

</script>
@stop