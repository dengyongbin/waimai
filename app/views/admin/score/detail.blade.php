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

                <h2>积分明细</h2>

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
                        <button type="submit" class="btn btn-primary"
                                onclick="location='{{{ URL::to('/admin/score/all') }}}';">
                            返回
                        </button>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>订单号</th>
                                <th>积分额</th>
                                <th>备注</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>deleted_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($detail as $key => $det)
                            <tr>
                                <td>{{{$key+1}}}</td>
                                <td>{{ $det->order_no }}</td>
                                <td>{{ $det->amount}}</td>
                                <td>{{ $det->info }}</td>
                                <td>{{ $det->created_at }}</td>
                                <td>{{ $det->updated_at }}</td>
                                <td>{{ $det->deleted_at }}</td>

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
    <script type="text/javascript">
        function deleteUser() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/user/delete/' + $(this).next().val();
                }
            });
        }
    </script>

</div>
@stop