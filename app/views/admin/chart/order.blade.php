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

                <h2>订单量分析</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!--widget div-->
            <div role="content">
                <div class="widget-body no-padding">
                    <div class="alert alert-info no-margin fade in">
                       <input id="seetype" type="hidden" value="{{$type}}">
                        <button id="day" name="btpye" type="submit" class="btn btn-default" onclick="location='{{{ URL::to('/admin/chart/byorder/day') }}}';">
                            当天
                        </button>
                        <button id="week" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/chart/byorder/week') }}}';">
                            一周
                        </button>
                        <button id="month" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/chart/byorder/month') }}}';">
                            一月
                        </button>
                        <button id="all" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/chart/byorder/all') }}}';">
                            所有
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">


                    <div id="container" style="width: 80%;float: left"></div>
                        <div class="table-responsive" style="width: 20%;float: right">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>序列</th>
                                    <th>时间</th>
                                    <th>数量</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (json_decode($result) as $key=>$res)
                                <tr>
                                    <td>{{{$key+1}}}</td>
                                    <td>{{ $res->fmtdays }}</td>
                                    <td>{{ $res->ct }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    <script src="{{{ asset('assets/js/chart/highcharts.js') }}}"></script>
                    <script src="{{{ asset('assets/My97DatePicker/WdatePicker.js') }}}"></script>
                    <script type="text/javascript">
                        $(function () {
                            var data = [], i,res,seetype,idx,fmt = ['%H','%m-%d','%Y-%m-%d','%Y-%m'];
                            res={{$result}};
                        seetype=$('#seetype').val();
                        $("button[name='btpye']").each(function(index){
                            if(this.id==seetype){
                                $(this).attr('class','btn btn-default');
                                idx=index;
                            }else{
                                $(this).attr('class','btn btn-primary');
                            }
                        });
                        for (i = 0; i < res.length; i++) {
                            data.push([parseInt(res[i].ms),parseInt(res[i].ct)]);
                        }
                        Highcharts.setOptions({
                            global: {
                                useUTC: false
                            }
                        });
                        $('#container').highcharts({
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text:false
                            },
                            subtitle: {
                                text: false
                            },
                            xAxis: {
                                type:'datetime',
                                labels: {
                                    formatter: function() {
                                        return  Highcharts.dateFormat(fmt[idx], this.value);
                                    }
                                }
                            },
                            yAxis: {
                                title: {
                                    text: '当日订餐数'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: //提示框设置
                            {
                                formatter: function() {  //格式化提示框的内容样式
                                    return '<b>日期：</b>' + Highcharts.dateFormat(fmt[idx], this.x) + '<br/>' + '<b>数量：</b>' + this.y;
                                }
                            },
                            series: [
                                {
                                    data: data
                                }
                            ]
                        });
                        });
                    </script>
                    </div>
                </div>
            </div>
            <!--end widget div-->

        </div>
    </article>
    <!--WIDGET END-->

</div>
@stop