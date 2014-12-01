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

                <h2>会员列表</h2>

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
                       <!-- <button type="submit" class="btn btn-primary"
                                onclick="location='{{{ URL::to('/admin/user/addUser') }}}';">
                            添加
                        </button>-->
                        <button type="submit" class="btn btn-primary"
                                onclick="deleteMember()">
                            删除
                        </button>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>帐号</th>
                                <th>姓名</th>
                                <th>电话</th>
                                <th>地址</th>
                                <th>创建时间</th>
                                <th>更新时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($members as $member)
                            <tr>
                                <td><input name="isselect" name="radio" type="radio" value=""/>
                                    <input id="id" type="hidden" value="{{$member->id}}">
                                </td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->mobile }}</td>
                                <td>{{ $member->address }}</td>
                                <td>{{ $member->created_at }}</td>
                                <td>{{ $member->updated_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dt-toolbar-footer" style="text-align: right;">{{$members->links();}}</div>
                    </div>
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
    </article>
    <!-- WIDGET END -->
    <script type="text/javascript">
        function deleteMember() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/member/delete/' + $(this).next().val();
                }
            });
        }
    </script>

</div>
@stop