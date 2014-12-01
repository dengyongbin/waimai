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

                <h2>兑换列表</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">

                <!-- widget content -->
                <div class="widget-body no-padding">

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
                        <div class="dt-toolbar-footer" style="text-align: right;">{{$exchanges->links();}}</div>
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