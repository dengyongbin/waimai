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
                        <button type="submit" class="btn btn-primary"
                                onclick="location='{{{ URL::to('/admin/user/add') }}}';">
                            添加
                        </button>
                        <button type="submit" class="btn btn-primary"
                                onclick="deleteUser()">
                            删除
                        </button>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>last_login</th>
                                <!--<th>permissions</th>-->
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($allUsers as $user)
                            <tr>
                                <td><input name="isselect" name="radio" type="radio" value=""/><input id="id"
                                                                                                      type="hidden"
                                                                                                      value="{{$user->id}}">
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <!-- <td>查看权限</td>-->
                                <td>{{ $user->last_login }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>

                                <td>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dt-toolbar-footer" style="text-align: right;">{{$allUsers->links();}}</div>
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