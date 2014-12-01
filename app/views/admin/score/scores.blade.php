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

                <h2>积分列表</h2>

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
                                <th>Name</th>
                                <th>次数</th>
                                <th>积分</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($score as $key => $sc)
                            <tr>
                                <td>{{{$key+1}}}</td>
                                <td>{{ $sc->email }}</td>
                                <td>{{ $sc->name }}</td>
                                <td>{{ $sc->ct }}<input id="id"
                                                        type="hidden"
                                                        value="{{$sc->member_id}}"></td>
                                <td>{{ $sc->am }}</td>

                                <td><a class="btn btn-danger"
                                       href="{{{ URL::to('/admin/score/'.$sc->member_id) }}}">明细</a>
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