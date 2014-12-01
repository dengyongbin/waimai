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
                                                             rel="tooltip"
                                                             title="" data-placement="bottom"
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
                                  rel="tooltip"
                                  data-placement="top" data-original-title="Magenta"></span></li>
                        <li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip"
                                  data-placement="right" data-original-title="Pink"></span></li>
                        <li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark"
                                  rel="tooltip"
                                  data-placement="left" data-original-title="Fade Pink"></span></li>
                        <li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight"
                                  rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li>
                        <li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip"
                                  data-placement="top" data-original-title="Teal"></span></li>
                        <li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip"
                                  data-placement="top" data-original-title="Ocean Blue"></span></li>
                        <li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark"
                                  rel="tooltip"
                                  data-placement="top" data-original-title="Night Sky"></span></li>
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
                                  rel="tooltip"
                                  data-placement="bottom" data-original-title="Light Red"></span></li>
                        <li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip"
                                  data-placement="right" data-original-title="Purity"></span></li>
                        <li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle=""
                               rel="tooltip" data-placement="bottom"
                               data-original-title="Reset widget color to default">Remove</a>
                        </li>
                    </ul>
                </div>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>

                <h2>礼品列表</h2>
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

                    <!--<div class="alert alert-info no-margin fade in">
                        <button class="close" data-dismiss="alert">
                            ×
                        </button>
                        <button type="submit" class="btn btn-primary"
                                onclick="location='{{{ URL::to('/admin/gift/add') }}}';">
                            添加
                        </button>
                        <button type="submit" class="btn btn-primary" onclick="deleteGift()">
                            删除
                        </button>
                        <button type="submit" class="btn btn-primary" onclick="editGift()">
                            修改
                        </button>
                    </div>-->
                    <div class="table-responsive">


                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>序号</th>
                                <th>礼品id</th>
                                <th>会员id</th>
                                <th>订单id</th>
                                <th>兑换数量</th>
                                <!--<th>permissions</th>-->
                                <th>使用积分</th>
                                <th>创建时间</th>
                                <th>修改时间</th>
                                <th>删除时间</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($exchanges as $key=>$ecs)
                            <tr>
                                <td><input name="isselect" name="radio" type="radio" value=""/><input id="id"
                                                                                                      type="hidden"
                                                                                                      value="{{$ecs->id}}">
                                </td>
                                <td>{{{$key+1}}}
                                </td>
                                <td>{{ $ecs->gift_id }}</td>
                                <td>{{ $ecs->member_id }}</td>
                                <td>{{ $ecs->order_id }}</td>
                                <td>{{ $ecs->number }}</td>
                                <td>{{ $ecs->score }}</td>
                                <td>{{ $ecs->created_at }}</td>
                                <td>{{ $ecs->updated_at }}</td>
                                <td>{{ $ecs->deleted_at }}</td>

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
        function deleteGift() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/gift/delete/' + $(this).next().val();
                }
            });
        }
        function editGift() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/gift/' + $(this).next().val();
                }
            });
        }
    </script>

</div>
@stop