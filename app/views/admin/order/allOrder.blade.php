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

                <h2>所有订单列表 </h2>

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

                    <div>
                        <form class="smart-form">
                            {{ Form::open(array('action' => 'AdminOrderController@allOrder', 'id' => 'query-order', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) }}
                            <header>
                                查询条件
                            </header>
                            <fieldset>
                                <div class="row">
                                    <section class="col col-2">
                                        <label class="input">
                                            {{ Form::text('contacts', $param->contacts , array('class' => 'input-sm', 'placeholder' => '联系人', 'maxlength' => '20')) }}
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <label class="input">
                                            {{ Form::text('telphone', $param->telphone , array('class' => 'input-sm', 'placeholder' => '联系电话', 'maxlength' => '20')) }}
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <label class="input">
                                            {{ Form::text('order_no', $param->order_no , array('class' => 'input-sm', 'placeholder' => '订单编号', 'maxlength' => '20')) }}
                                        </label>
                                    </section>
                                    <section  class="col col-2">
                                        <label class="select">
                                            {{ Form::select('order_status', $enums['ORDER_STATUS'], $param->order_status) }}
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <label class="input">
                                            {{ Form::text('start_time', $time[0] , array('class' => 'Wdate datefmt', 'placeholder' => '开始时间', 'onClick' => 'WdatePicker()')) }}
                                            <!--<input type="text" id="start_time" value="{{ $time[0] }}" class="Wdate datefmt" placeholder="开始时间" onClick="WdatePicker()">-->
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <label class="input">
                                            {{ Form::text('end_time', $time[1] , array('class' => 'Wdate datefmt', 'placeholder' => '结束时间', 'onClick' => 'WdatePicker()')) }}
                                            <!--<input type="text" id="end_time" value="{{ $time[1] }}" class="Wdate datefmt" placeholder="结束时间" onClick="WdatePicker()">-->
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <input type="submit" value="提交查询" class="btn btn-primary">
                                <input type="button" value="手动清理完成订单" class="btn btn-primary">
                            </footer>
                            {{ Form::close() }}

                    </div>

                    <div>
                        @foreach ($orders as $order)
                        <form method="post" name="form1" action="http://m2.waimairen.com/adminpage/order/module/orderlist">
                            <table class="table table-bordered" width="95%" style="font-size: 12px; margin-top: 5px; text-align: left; margin-left: 20px;" id="order_area_1183">
                                <tbody><tr>
                                    <td colspan="2" style="text-align:left;">单号：{{{ $order->order_no }}}</td>
                                    <td colspan="2" style="text-align:left;">创建时间：{{{ $order->created_at }}}</td>
                                    <td colspan="2" style="text-align:left;">订单状态: {{{ $enums['ORDER_STATUS'][$order->order_status] }}}</td>
                                </tr>
                                <tr style="height:20px;line-height:20px;">
                                    <td colspan="2" style="text-align:left;">支付方式：{{{ $enums['PAY_TYPE'][$order->pay_type] }}}</td>
                                    <td colspan="2" style="text-align:left;">支付状态：{{{ $enums['PAY_STATUS'][$order->pay_status] }}}</td>
                                    <td colspan="2" style="text-align:left;">下单来源: {{{ $order->source }}}</td>
                                </tr>
                                <tr style="height:20px;line-height:20px;">
                                    <td colspan="2" style="text-align:left;">配送时间：{{{ $order->delivery_time }}}</td>
                                    <td colspan="2" style="text-align:left;">订单类型：{{{ $enums['ORDER_TYPE'][$order->order_type] }}}</td>
                                    <td colspan="2" style="text-align:left;">ip信息：{{{ $order->ip }}}</td>
                                </tr>
                                <tr style="height:20px;line-height:20px;">
                                    <td colspan="2" style="text-align:left;">联系人：{{{ $order->contacts }}}</td>
                                    <td colspan="2" style="text-align:left;">配送地址：{{{ $order->address }}}</td>
                                    <td colspan="2" style="text-align:left;">联系电话：{{{ $order->telphone }}}</td>
                                </tr>

                                <tr>
                                </tr>
                                <tr style="height:20px;line-height:20px;">
                                    <td colspan="3" width="50%" valign="top">
                                        <table style="margin:0px;padding:0px;font-size:12px;" width="100%">
                                            <tbody>
                                            <tr style="height:20px;line-height:20px;">
                                                <td style="border:none;padding:0px;color:gray;text-align:left;" width="60%">名称</td>
                                                <td style="border:none;padding:0px;color:gray;" width="15%">价格</td>
                                                <td style="border:none;padding:0px;color:gray;">数量</td>
                                            </tr>

                                            @foreach ($good_orders[$order->id] as $good)
                                            <tr style="height:20px;line-height:20px;"><td style="border:none;padding:0px;color:gray;text-align:left;">{{{ $good['good_name'] }}}</td>
                                                <td style="border:none;padding:0px;color:gray;">{{{ $good['price'] }}}元</td>
                                                <td style="border:none;padding:0px;color:gray;">{{{ $good['number'] }}}份</td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </td>
                                    <td colspan="3" style="text-align:left;color:gray;" valign="top">
                                        <table style="margin:0px;padding:0px;font-size:12px;text-align:left;" width="100%">
                                            <tbody><tr style="height:20px;line-height:20px;">
                                                <td style="border:none;padding:0px;color:gray;" width="100px;">店铺商品总价</td>
                                                <td style="border:none;padding:0px;color:gray;">{{{ $order->total_price }}}元</td>
                                            </tr>

                                            <tr style="height:20px;line-height:20px;">
                                                <td style="border:none;padding:0px;color:gray;" width="100px;">应收</td>
                                                <td style="border:none;padding:0px;color:gray;">{{{ $order->real_price }}}元 </td>
                                            </tr>
                                            <tr style="height:20px;line-height:20px;">
                                                <td style="border:none;padding:0px;color:gray;" width="100px;">备注</td>
                                                <td style="border:none;padding:0px;color:gray;">{{{ $order->remark }}}</td>
                                            </tr>
                                            </tbody></table>

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="6" style="text-align:left;" class="order_control">
                                        <a href="javascript:void(0);" onclick="printorder(1183);">打印订单</a>
                                    </td>
                                </tr>
                                </tbody></table>
                        </form>
                        @endforeach
                        <div style="text-align: right;">
                            {{ $orders->appends(array('contacts' => $param->contacts,'telphone' => $param->telphone,'order_no' => $param->order_no))->links() }}
                        </div>
                    </div>

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
<script src="{{{ asset('assets/My97DatePicker/WdatePicker.js') }}}"></script>
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
        /* END BASIC */
    })

</script>
@stop