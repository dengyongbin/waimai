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

                <h2>文章评论列表</h2>

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
                                onclick="location='{{{ URL::to('/admin/article/comment/add') }}}';">
                            添加
                        </button>
                        <button type="submit" class="btn btn-primary"
                                onclick="deleteCmt()">
                            删除
                        </button>
                        <button type="submit" class="btn btn-primary" onclick="editCmt()">
                            修改
                        </button>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>序号</th>
                                <th>文章名称</th>
                                <th>评论者</th>
                                <th>评论者评论的编号</th>
                                <th>评论内容</th>
                                <!--<th>permissions</th>-->
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>deleted_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $key=>$cmt)
                            <tr>
                                <td><input name="isselect" name="radio" type="radio" value=""/><input id="id"
                                                                                                      type="hidden"
                                                                                                      value="{{$cmt->id}}">
                                </td>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>{{ $cmt->article_name }}</td>
                                <td>{{ $cmt->member_name }}</td>
                                <td>{{ $cmt->pid }}</td>
                                <td>{{ $cmt->content }}</td>
                                <td>{{ $cmt->created_at }}</td>
                                <td>{{ $cmt->updated_at }}</td>
                                <td>{{ $cmt->deleted_at }}</td>
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
        function deleteCmt() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/article/comment/delete/' + $(this).next().val();
                }
            });
        }
        function editCmt() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/article/comment/' + $(this).next().val();
                }
            });
        }
    </script>

</div>
@stop