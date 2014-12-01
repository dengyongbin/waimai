@extends('admin.base')

@section('content-main')

<style type="text/css">
    ul,h3{ margin:0; padding:0; font-family:'微软雅黑'; font-size:14px;}
    ul h3{ color:#fff; height:12px; padding-top:17px;}
    .span1 { color:#d80919; height:43px; line-height:63px; text-align:center; font-weight:bold; display:inline-block;}
</style>

<!-- MAIN CONTENT -->
<div id="content">

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
        </div>

        <!-- end row -->

    </section>
    <!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->
<!-- widget grid -->

<!-- end widget grid -->

@stop


@section('load-page-related-plugins')

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<!--<script src="{{{ asset('assets/js/plugin/flot/jquery.flot.cust.min.js') }}}"></script>
<script src="{{{ asset('assets/js/plugin/flot/jquery.flot.resize.min.js') }}}"></script>
<script src="{{{ asset('assets/js/plugin/flot/jquery.flot.tooltip.min.js') }}}"></script>-->

@stop


@section('append-script-on-ready')

@stop