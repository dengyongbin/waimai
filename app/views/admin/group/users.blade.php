@extends('admin.base')
@section('content-main')
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-x" data-widget-colorbutton="false"
             data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false"
             data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false"
             role="widget" style="">

            <header role="heading">
                <span class="widget-icon"> <i class="fa fa-align-justify"></i> </span>

                <h2>用户列表</h2>

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
                        <!-- <i class="fa-fw fa fa-info"></i>-->
                        <!--Adds zebra-striping to table row within <code>&lt;table&gt;</code> by adding the--><!--
                        <code>.table-striped</code>
                        with the base class-->
                        <form id="groupUser" role="form" action="/admin/group/user/save">

                            <button type="button" class="btn btn-primary"
                                    onclick="location='{{{ URL::to('/admin/group/all') }}}';">
                                返回
                            </button>
                            <button type="submit" class="btn btn-primary">
                                提交
                            </button>
                            （组名称： {{$name}}  ）
                            <input name="group_id" type="hidden" value="{{ $group_id}}">
                            <input id="userid" name="userid" type="hidden" value="">
                        </form>
                    </div>
                    <div class="table-responsive">


                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>Email</th>
                                <!--<th>permissions</th>-->
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($groupUsers as $groupUser)
                            <tr>
                                <td>@if(empty($groupUser->group_id))
                                    <input type="checkbox" name="ischeck">
                                    @else
                                    <input type="checkbox" name="ischeck" checked="checked">
                                    @endif
                                    <input type="hidden" name="user_id" value="{{ $groupUser->id }}">
                                </td>
                                <td>{{ $groupUser->email }}</td>
                                <td>{{ $groupUser->created_at }}</td>
                                <td>{{ $groupUser->updated_at }}</td>
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
    <script type="application/javascript">
        $('#groupUser').submit(function () {
            var groupid = $("input[name='group_id']").val();
            var userid = '';
            $("input[name='ischeck']:checked").each(function () {
                userid += $(this).parent().find("input[name='user_id']").val() + ",";
            });
            $("#userid").val(userid);
        });
    </script>

</div>
@stop