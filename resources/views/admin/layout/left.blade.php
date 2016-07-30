{{--左侧菜单模板--}}


<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        {{--<li>--}}
            {{--<a href="/lhadmin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>--}}
            {{--<ul id="demo" class="collapse">--}}
                {{--<li>--}}
                    {{--<a href="#">Dropdown Item</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">Dropdown Item</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>--}}
        {{--</li>--}}
        {{--<li class="active">--}}
            {{--<a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>--}}
        {{--</li>--}}

        <li>
            <a href="{{DOMAIN}}lhadmin"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
        </li>
        <li>
            {{--<a href="{{DOMAIN}}lhadmin/admin"><i class="fa fa-fw fa-table"></i> 管理员</a>--}}
            <a href="javascript:;" data-toggle="collapse" data-target="#demo1">
                <i class="fa fa-fw fa-arrows-v"></i> 管理员
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="demo1" class="collapse">
                <li>
                    <a href="/lhadmin/admin"><i class="fa fa-fw fa-table"></i> 管理列表</a>
                </li>
                <li>
                    <a href="/lhadmin/admin/setting"><i class="fa fa-fw fa-edit"></i> 你的资料</a>
                </li>
                <li>
                    <a href="/lhadmin/admin/pwd"><i class="fa fa-fw fa-edit"></i> 你的密码</a>
                </li>
            </ul>
        </li>
        <li>
            {{--<a href="/lhadmin/user"><i class="fa fa-fw fa-table"></i> 会员</a>--}}
            <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
                <i class="fa fa-fw fa-arrows-v"></i> 会员
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="demo2" class="collapse">
                <li>
                    <a href="{{DOMAIN}}lhadmin/user"><i class="fa fa-fw fa-table"></i> 管理列表</a>
                </li>
                <li>
                    <a href="{{DOMAIN}}lhadmin/identity"><i class="fa fa-fw fa-edit"></i> 身份查询</a>
                </li>
            </ul>
        </li>
        <li>
            {{--<a href="/lhadmin/user"><i class="fa fa-fw fa-table"></i> 会员</a>--}}
            <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
                <i class="fa fa-fw fa-arrows-v"></i> 日志管理
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="demo3" class="collapse">
                <li>
                    <a href="{{DOMAIN}}lhadmin/adminlog"><i class="fa fa-fw fa-wrench"></i> 管理员日志</a>
                </li>
                <li>
                    <a href="{{DOMAIN}}lhadmin/userlog"><i class="fa fa-fw fa-wrench"></i> 会员日志</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->