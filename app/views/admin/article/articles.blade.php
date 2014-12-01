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

                <h2>文章列表</h2>

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
                                onclick="location='{{{ URL::to('/admin/article/add') }}}';">
                            添加
                        </button>
                        <button type="submit" class="btn btn-primary" onclick="editArt()">
                            修改
                        </button>
                        <button type="submit" class="btn btn-primary"
                                onclick="deleteArt()">
                            删除
                        </button>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>序号</th>
                                <th>标题</th>
                                <th>主题图片</th>
                                <th>摘要</th>
                                <!--<th>permissions</th>-->
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>deleted_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $key=>$art)
                            <tr>
                                <td><input name="isselect" name="radio" type="radio" value=""/><input id="id"
                                                                                                      type="hidden"
                                                                                                      value="{{$art->id}}">
                                </td>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>{{ $art->title }}</td>
                                <td>{{ $art->photo }}</td>
                                <td>{{ $art->summary }}</td>
                                <td>{{ $art->created_at }}</td>
                                <td>{{ $art->updated_at }}</td>
                                <td>{{ $art->deleted_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dt-toolbar-footer" style="text-align: right;">{{$articles->links();}}</div>
                    </div>
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
    </article>
    <!-- WIDGET END -->
    <script type="text/javascript">
        function deleteArt() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/article/delete/' + $(this).next().val();
                }
            });
        }
        function editArt() {
            $(":radio").each(function () {
                if (this.checked) {
                    location = '/admin/article/' + $(this).next().val();
                }
            });
        }
    </script>

</div>
@stop