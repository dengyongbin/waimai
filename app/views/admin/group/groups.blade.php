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

                <h2>用户组列表</h2>

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
                    <button type="submit" class="btn btn-primary"
                            onclick="location='{{{ URL::to('/admin/group/add') }}}';">
                        添加
                    </button>
                    <button type="submit" class="btn btn-primary" onclick="deleteGroup()">
                        删除
                    </button>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>name</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td><input name="isselect" type="radio" value=""><input type="hidden"
                                                                                    value="{{ $group->id }}"></td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->created_at }}</td>
                            <td>{{ $group->updated_at }}</td>
                            <td>
                                <button onclick="location='{{{ URL::to('/admin/group/'.$group->id) }}}';"
                                        class="btn btn-primary">
                                    组成员
                                </button>
                                <button onclick="location='{{{ URL::to('/admin/group/pms/'.$group->id) }}}';"
                                        class="btn btn-primary">
                                    组权限
                                </button>
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
<div id="addtab" title="组成员管理">
    <form>

        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-4">
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox" checked="checked">
                            <i></i>Alexandra</label>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Alice</label>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Anastasia</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox" checked="checked">
                            <i></i>Alexandra</label>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Alice</label>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Anastasia</label>
                    </div>
                </div>
            </section>
        </fieldset>

    </form>

</div>

<!-- WIDGET END -->
<script type="application/javascript">
    var dialog = $("#addtab").dialog({
        autoOpen: false,
        width: 600,
        resizable: false,
        modal: true,
        buttons: [
            {
                html: "<i class='fa fa-times'></i>&nbsp; 取消",
                "class": "btn btn-default",
                click: function () {
                    $(this).dialog("close");

                }
            },
            {

                html: "<i class='fa fa-plus'></i>&nbsp; 保存",
                "class": "btn btn-danger",
                click: function () {
                    addTab();
                    $(this).dialog("close");
                }
            }
        ]
    });
    function opendialog() {
        dialog.dialog("open");
    }
    function addTab() {
        var label = tabTitle.val() || "Tab " + tabCounter, id = "tabs-" + tabCounter, li = $(tabTemplate.replace(/#\{href\}/g, "#" + id).replace(/#\{label\}/g, label)), tabContentHtml = tabContent.val() || "Tab " + tabCounter + " content.";

        tabs.find(".ui-tabs-nav").append(li);
        tabs.append("<div id='" + id + "'><p>" + tabContentHtml + "</p></div>");
        tabs.tabs("refresh");
        tabCounter++;

        // clear fields
        $("#tab_title").val("");
        $("#tab_content").val("");
    }
    function deleteGroup() {
        $(":radio").each(function () {
            if (this.checked) {
                location = '/admin/group/delete/' + $(this).next().val();
            }
        });
    }
</script>

</div>
@stop