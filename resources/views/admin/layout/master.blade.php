<!doctype html>
<html class="no-js" lang="">
<head>
    @include('admin/layout/head')
</head>
<body>
<aside id="left-panel" class="left-panel">
    @include('admin/layout/aside')
</aside>

<div id="right-panel" class="right-panel">
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="./"><img src="{{URL::asset('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{URL::asset('images/logo2.png')}}" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        @include('admin/layout/right_head')
    </header>

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            @yield('breadcrumbs')
        </div>
    </div>

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>


    <div class="clearfix"></div>

    @include("admin/layout/footer")

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
    @include("admin/layout/scripts")

</body>
</html>
