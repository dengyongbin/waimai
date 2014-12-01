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

                <h2>菜品销量分析</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!--widget div-->
            <div role="content">
                <div class="widget-body no-padding">
                    <div class="alert alert-info no-margin fade in">
                       <input id="seetype" type="hidden" value="{{$type}}">
                        <button id="day" name="btpye" type="submit" class="btn btn-default" onclick="location='{{{ URL::to('/admin/chart/bygoods/day') }}}';">
                            当天
                        </button>
                        <button id="week" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/chart/bygoods/week') }}}';">
                            一周
                        </button>
                        <button id="month" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/chart/bygoods/month') }}}';">
                            一月
                        </button>
                        <button id="all" name="btpye" type="submit" class="btn btn-primary" onclick="location='{{{ URL::to('/admin/chart/bygoods/all') }}}';">
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
                                    <td>{{ $res->good_name }}</td>
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
                        var data = [], i,res,seetype;
                        res={{$result}};
                        seetype=$('#seetype').val();
                        $("button[name='btpye']").each(function(){
                            if(this.id==seetype){
                                $(this).attr('class','btn btn-default');
                            }else{
                                $(this).attr('class','btn btn-primary');
                            }
                        });
                        for (i = 0; i < res.length; i++) {
                            data.push([res[i].good_name,parseInt(res[i].ct)]);
                        }
                        Highcharts.setOptions({
                            global: {
                                useUTC: false
                            }
                        });
                        $('#container').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text:false
                            },
                            subtitle: {
                                text: false
                            },
                            xAxis: {
                                categories: [
                                    '数据统计'
                                ]
                            },
                            yAxis: {
                                title: {
                                    text: '数量（份）'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                pointFormat: '数量：{point.y}'
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