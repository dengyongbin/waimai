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

                <h2>禁用列表</h2>

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

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>Email</th>
                                <th>ip_address</th>
                                <th>attempts</th>
                                <th>suspended</th>
                                <!--<th>permissions</th>-->
                                <th>banned</th>
                                <th>last_attempt_at</th>
                                <th>suspended_at</th>
                                <th>banned_at</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($throttles as $key => $throttle)
                            <tr>
                                <td>{{{$key+1}}}</td>
                                <td>{{ $throttle->email }}</td>
                                <td>{{ $throttle->ip_address }}</td>
                                <td>{{ $throttle->attempts }}</td>
                                <!-- <td>查看权限</td>-->
                                <td>{{ $throttle->suspended }}</td>
                                <td>{{ $throttle->banned }}</td>
                                <td>{{ $throttle->last_attempt_at }}</td>
                                <td>{{ $throttle->suspended_at }}</td>
                                <td>{{ $throttle->banned_at }}</td>
                                <td>
                                    @if ($throttle->banned == 0)
                                    <a class="btn btn-danger"
                                       href="{{{ URL::to('/admin/throttle/banUser/'.$throttle->uid) }}}">封禁</a>
                                    @else
                                    <a class="btn btn-warning"
                                       href="{{{ URL::to('/admin/throttle/unbanUser/'.$throttle->uid) }}}">解禁</a>
                                    @endif


                                    <!-- <button class="btn btn-xs btn-success"><i class="btn btn-danger"></i>封禁</button>
                                     <button class="btn btn-xs btn-danger"><i class="icon-remove"></i></button>-->

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
    </article>
    <!-- WIDGET END -->


</div>
@stop