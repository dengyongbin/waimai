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

                <h2>菜单节点</h2>

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
                <form class="smart-form" role="form" method="get" action="/admin/menu/node/save">
                    <div class="alert alert-info no-margin fade in">
                        <button class="close" data-dismiss="alert">
                            ×
                        </button>
                        <button type="submit" class="btn btn-primary">
                            保存
                        </button>
                        <button type="button" class="btn btn-primary"
                                onclick="location='{{{ URL::to('/admin/menu/all') }}}';">
                            返回
                        </button>
                    </div>
                    <div class="table-responsive">

                        <fieldset>
                            <section>
                                <label class="label">标题</label>
                                <label class="input">
                                    <input type="hidden" name="id" value="{{$node[0]->id}}">
                                    <input type="text" name="title" class="input-xs" value="{{$node[0]->title}}">
                                </label>
                            </section>


                            @if($node[0]->parent==0)
                            <input type="hidden" name="parent" value="{{$node[0]->parent}}">
                            @else
                            <section>
                                <label class="label">父节点名称</label>
                                <label class="select select-multiple">
                                    <select name="parent" class="custom-scroll">
                                        @foreach ($allmenus as $menu)
                                        @if($node[0]->parent === $menu->id)
                                        <option value="{{ $menu->id }}" selected="selected">{{ $menu->title }}</option>
                                        @else
                                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                        @endif
                                        @endforeach
                                    </select> </label>

                            </section>
                            @endif

                            <section>
                                <label class="label">描述</label>
                                <label class="input">
                                    <input type="text" name="description" class="input-xs"
                                           value="{{$node[0]->description}}">
                                </label>
                            </section>
                            <section>
                                <label class="label">链接</label>
                                <label class="input">
                                    <input type="text" name="url" class="input-xs" value="{{$node[0]->url}}">
                                </label>
                            </section>
                            <section>
                                <label class="label">视图</label>
                                <label class="input">
                                    <input type="text" name="view" class="input-xs" value="{{$node[0]->view}}">
                                </label>
                            </section>
                            <section>
                                <label class="label">图标</label>
                                <label class="input">
                                    <input type="text" name="icon" class="input-xs" value="{{$node[0]->icon}}">
                                </label>
                            </section>
                            <section>
                                <label class="label">排序</label>
                                <label class="input">
                                    <input type="text" name="sort" class="input-xs" value="{{$node[0]->sort}}">
                                </label>
                            </section>
                            <section>
                                <label class="label">启用
                                    @if(!is_null($node[0]->used))
                                    <input type="checkbox" name="used" checked="checked" value="{{$node[0]->used}}">
                                    @else
                                    <input type="checkbox" name="used" value="{{$node[0]->used}}">
                                    @endif
                                </label>
                            </section>
                        </fieldset>

                    </div>
                </form>
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
</article>
<!-- WIDGET END -->


</div>
@stop