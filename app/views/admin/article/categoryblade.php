@extends('admin.base')
@section('content-main')
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->

        <!-- end widget -->

        <!-- Widget ID (each widget will need unique ID)-->

        <!-- end widget -->


        <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1"
             data-widget-editbutton="false" role="widget" style="">
            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->
            <header role="heading">
                <div class="jarviswidget-ctrls" role="menu"><a href="javascript:void(0);"
                                                               class="button-icon jarviswidget-toggle-btn" rel="tooltip"
                                                               title="" data-placement="bottom"
                                                               data-original-title="Collapse"><i
                            class="fa fa-minus "></i></a> <a href="javascript:void(0);"
                                                             class="button-icon jarviswidget-fullscreen-btn"
                                                             rel="tooltip" title="" data-placement="bottom"
                                                             data-original-title="Fullscreen"><i
                            class="fa fa-expand "></i></a>
                    <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title=""
                       data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                <div class="widget-toolbar" role="menu"><a data-toggle="dropdown"
                                                           class="dropdown-toggle color-box selector"
                                                           href="javascript:void(0);"></a>
                    <ul class="dropdown-menu arrow-box-up-right color-select pull-right">
                        <li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip"
                                  data-placement="left" data-original-title="Green Grass"></span></li>
                        <li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark"
                                  rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li>
                        <li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight"
                                  rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li>
                        <li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip"
                                  data-placement="top" data-original-title="Purple"></span></li>
                        <li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta"
                                  rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li>
                        <li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip"
                                  data-placement="right" data-original-title="Pink"></span></li>
                        <li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark"
                                  rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li>
                        <li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight"
                                  rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li>
                        <li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip"
                                  data-placement="top" data-original-title="Teal"></span></li>
                        <li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip"
                                  data-placement="top" data-original-title="Ocean Blue"></span></li>
                        <li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark"
                                  rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li>
                        <li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip"
                                  data-placement="right" data-original-title="Night"></span></li>
                        <li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip"
                                  data-placement="left" data-original-title="Day Light"></span></li>
                        <li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip"
                                  data-placement="bottom" data-original-title="Orange"></span></li>
                        <li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark"
                                  rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li>
                        <li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip"
                                  data-placement="bottom" data-original-title="Red Rose"></span></li>
                        <li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight"
                                  rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li>
                        <li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip"
                                  data-placement="right" data-original-title="Purity"></span></li>
                        <li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle=""
                               rel="tooltip" data-placement="bottom"
                               data-original-title="Reset widget color to default">Remove</a>
                        </li>
                    </ul>
                </div>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>

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
                    location = '/admin/user/delete/'+$(this).next().val();
                }
            });
        }
    </script>

</div>
@stop