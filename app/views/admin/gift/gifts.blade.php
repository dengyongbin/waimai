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

                <h2>礼品列表</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">


                <!-- widget content -->
                <div class="widget-body no-padding">

                    <div class="alert alert-info no-margin fade in">
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
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>序号</th>
                                <th>礼品标题</th>
                                <th>照片</th>
                                <th>市场价</th>
                                <th>需要积分</th>
                                <!--<th>permissions</th>-->
                                <th>库存</th>
                                <th>创建时间</th>
                                <th>修改时间</th>
                                <th>删除时间</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($gifts as $key=>$gift)
                            <tr>
                                <td><input name="isselect" name="radio" type="radio" value=""/><input id="id"
                                                                                                      type="hidden"
                                                                                                      value="{{$gift->id}}">
                                </td>
                                <td>{{{$key+1}}}
                                </td>
                                <td>{{ $gift->title }}</td>
                                <td><img src="{{{ $gift->photo }}}" width="50px" height="50px"/></td>
                                <td>{{ $gift->price }}</td>
                                <td>{{ $gift->score }}</td>
                                <td>{{ $gift->stock }}</td>
                                <td>{{ $gift->created_at }}</td>
                                <td>{{ $gift->updated_at }}</td>
                                <td>{{ $gift->deleted_at }}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dt-toolbar-footer" style="text-align: right;">{{$gifts->links();}}</div>
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