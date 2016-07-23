{{--顶部模板--}}


<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">龙魂-管理 </a>
</div>
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ \Session::has('admin') ? \Session::get('admin.username') : '' }} <b class="caret"></b></a>
        <ul class="dropdown-menu">
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{ DOMAIN }}lhadmin/admin/setting"><i class="fa fa-fw fa-gear"></i> 设置 </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ DOMAIN }}lhadmin/logout"><i class="fa fa-fw fa-power-off"></i> 退出 </a>
            </li>
        </ul>
    </li>
</ul>