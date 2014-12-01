@extends('admin.base')
@section('content-main')
<div class="row">

<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- new widget -->

    <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-x" data-widget-colorbutton="false"
         data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false"
         data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false"
         role="widget" style="">
        <header>
            <h2> 账单明细 </h2>
        </header>
        {{ Form::open(array('action' => 'PhoneOrderController@addOrder','id' => 'create_order', 'class' =>
        'smart-form')) }}
        <!-- widget div-->
        <div>

            <div class="widget-body">
                <!-- content goes here -->

                <div class="table-responsive">

                    <table id="odlt" class="table table-bordered" style="text-align: center;">
                        <thead>
                        <tr>
                            <th style="text-align: center">数量</th>
                            <th style="text-align: center">菜名</th>
                            <th style="text-align: center">单价</th>
                            <th style="text-align: center">金额</th>
                        </tr>
                        <tr style="display: none">
                            <td style="width: 100px;" style="vertical-align: middle;">
                                <i class="fa fa-minus" style="cursor: pointer" onclick="minusClick(this);"></i>
                                {{ Form::hidden('good_id[]', $goodOrder->good_id) }}
                                {{ Form::hidden('good_name[]', $goodOrder->good_name) }}
                                {{ Form::text('quantity[]',
                                $goodOrder->number,array('class'=>'quantity','readonly'=>'true'))}}
                                {{ Form::hidden('price[]', $goodOrder->price) }}
                                {{ Form::hidden('total_price[]', $goodOrder->total_price) }}
                                <i
                                    class="fa fa-plus" style="cursor: pointer" onclick="plusClick(this);"></i>
                            </td>
                            <td style="vertical-align: middle;">name</td>
                            <td style="vertical-align: middle;">price</td>
                            <td style="vertical-align: middle;">amount</td>
                        </tr>
                        </thead>
                        <tbody style="background-color: white;">

                        </tbody>
                    </table>

                </div>

                <!-- end content -->
            </div>

        </div>
        <div class="well well-sm" id="event-container">


            <fieldset style="background:none">
                <div class="row">
                    <section class="col col col-lg-12">
                        <div class="input-group">
                            <span class="input-group-addon">¥</span>
                            {{ Form::text('totalprice', $good->totalprice
                            ,array('class'=>'form-control','readonly'=>'true','id'=>'real_price')) }}
                            <span class="input-group-addon">元</span>
                        </div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col col-lg-12">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                            {{ Form::text('contacts', $good->contacts ) }}
                        </label>
                    </section>
                </div>
                <div class="row">
                    <section class="col col col-lg-12">
                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                            {{ Form::text('telphone', $good->telphone ) }}
                        </label>
                    </section>
                </div>
                <div class="row">
                    <section class="col col col-lg-12">
                        <label class="input"> <i class="icon-prepend fa fa-tag"></i>
                            {{ Form::text('address', $good->address) }}
                        </label>
                    </section>
                </div>
                <footer style="background: none">
                    <!--<button type="submit" class="btn btn-primary">
                        打印
                    </button>
                    <button type="button" class="btn btn-default" onclick="emptylt();">
                        清空
                    </button>-->
                    {{Form::submit('打印', array('class'=>'btn btn-primary'));}}
                    {{Form::button('清空', array('class'=>'btn btn-default','onClick'=>'emptylt()'));}}
                </footer>
            </fieldset>
        </div>
        {{ Form::close() }}
        <!-- end widget div -->
    </div>
    <!-- end widget -->
</div>

<div class="col-sm-12 col-md-12 col-lg-9">
    <!-- new widget -->
    <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-x" data-widget-colorbutton="false"
         data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false"
         data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false"
         role="widget" style="">
        <header role="heading">
            <span class="widget-icon"> <i class="fa fa-align-justify"></i> </span>

            <h2>菜单</h2>

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
        <!-- widget div-->
        <div>

            <div class="widget-body no-padding">
                <!-- content goes here -->
                <div class="widget-body-toolbar">

                    <div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons"
                         style="width: 60%;margin: auto">
                        <label class="btn btn-default active">
                            <input type="radio" name="iselect" id="icon-1" value="0" checked="">
                            全部</label>
                        @foreach($catgs as $key => $catg)
                        <label class="btn btn-default">
                            <input type="radio" name="iselect" id="icon-6" value="{{$catg->id}}">
                            {{$catg->name}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="fc">
                    <div class="fc-content" style="position: relative; min-height: 1px;padding: 10px;">
                        <div class="fc-view fc-view-month fc-grid" style="position: relative;" unselectable="on">
                            <ul class="goodboxs">
                                @foreach ($goods as $key => $good)
                                <li name="{{ $good->category_id }}-{{ $good->id }}" class="goodbox"><h3
                                        style="line-height: 50px;"><span>{{
                                        $good->name }}</span><br>¥:<span>{{ $good->price }}</span>
                                    </h3>
                                    <!--<i class="fa fa-check"></i>-->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- end content -->
            </div>

        </div>
        <!-- end widget div -->
    </div>
    <!-- end widget -->
    <script type="text/javascript">
        $(document).ready(function () {
            //类别筛选
            $("input[name='iselect']").change(function () {
                isval = $(this).val();
                goodsDiff(isval);
            });
            $(".goodbox").click(function () {
                var _this = this;
                //判断订单列是否已点
                tgtbody = $("#odlt > tbody");
                var isexist = false;
                tgtbody.find("input[name='good_id[]']").each(function () {
                    if ($(this).val() == $(_this).attr('name').split('-')[1]) {
                        //已点则数量加一
                        plusClick($(this));
                        isexist = true;
                        return false;
                    }
                });
                //未点这新加行
                if (!isexist) {
                    addRow($(_this));
                }

            });
        });
        //添加列
        function addRow(obj) {
            //未点这加入订单列
            tmptr = $("#odlt > thead > tr:eq(1)")
            clonetr = tmptr.clone();
            clonetr.css("display", "");
            $(obj).animate({backgroundColor: "#c79121"});
            clonetr.prependTo(tgtbody);
            valueSet($(obj));
            rowAmount($("#odlt > tbody > tr:eq(0) > td:eq(0)"));
        }

        function valueSet(liobj) {
            rowObj = $("#odlt > tbody > tr:eq(0)")
            //设置td显示列
            $(rowObj).find("td:eq(1)").html($(liobj).find("span:eq(0)").html());
            $(rowObj).find("td:eq(2)").html($(liobj).find("span:eq(1)").html());
            //设置隐藏域
            $(rowObj).find("input:eq(0)").val($(liobj).attr('name').split('-')[1]);
            $(rowObj).find("input:eq(1)").val($(liobj).find("span:eq(0)").html());
            $(rowObj).find("input:eq(2)").val(1);
            $(rowObj).find("input:eq(3)").val($(liobj).find("span:eq(1)").html());
            $(rowObj).find("input:eq(4)").val($(liobj).find("span:eq(1)").html());
        }
        //菜品分类
        function goodsDiff(isval) {
            if (isval == 0) {
                $('.goodboxs').find('li').show();
            } else {
                $('.goodboxs').find('li').hide();
                $('li[name^=' + isval + ']').show();
            }
        }
        //点击减号
        function minusClick(obj) {
            tr = $(obj).parents("tr");
            if (tr.find("input:eq(2)").val() == 1) {
                tr.remove();
                $('li[name$=' + tr.find("input:eq(0)").val() + ']').animate({backgroundColor: "#568A89"});
            } else {
                tr.find("input:eq(2)").val(parseInt(tr.find("input:eq(2)").val()) - 1);
            }
            rowAmount($(obj));
        }
        //点击加号
        function plusClick(obj) {
            rowObj = $(obj).parents("tr");
            rowObj.find("input:eq(2)").val(parseInt(rowObj.find("input:eq(2)").val()) + 1);
            rowAmount($(obj));
        }
        //单行金额计算
        function rowAmount(obj) {
            rowObj = $(obj).parents("tr");
            rowObj.find("td:eq(3)").html(parseInt(rowObj.find("input:eq(2)").val()) * parseFloat(rowObj.find("td:eq(2)").html()));
            rowObj.find("input:eq(4)").val(parseInt(rowObj.find("input:eq(2)").val()) * parseFloat(rowObj.find("td:eq(2)").html()));
            allAmount();
        }
        //总合计计算
        function allAmount() {
            amount = 0;
            $("#odlt > tbody > tr").find("td:eq(3)").each(function (i) {
                amount += parseFloat($(this).html());
            });
            $("#real_price").val(amount);
        }
        //清空所有
        function emptylt() {
            $("#odlt > tbody").empty();
            $(".smart-form :input:not(:submit)").val("");
            $(".goodbox").animate({backgroundColor: "#568A89"});
        }
    </script>
    <style>
        .goodboxs {
            list-style: none;
            width: 100%;
        }

        .goodbox {
            display: block;
            float: left;
            position: relative;
            width: 140px;
            height: 140px;
            margin: 1px;
            color: #ffffff;
            background-color: #568A89;
            border-radius: 3px;
            border-color: #468847;
            cursor: pointer;
            text-align: center;
        }

        .quantity {
            width: 20px;
            height: 20px;
            margin: 5px;
            text-align: center;
        }
    </style>
</div>

</div>
@stop