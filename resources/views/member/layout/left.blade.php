{{--会员左边--}}


<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="{{DOMAIN}}member">
                <i class="icon-home"></i>
                <span>首页</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>您的账户</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{DOMAIN}}member/user">基本资料</a></li>
                <li><a href="{{DOMAIN}}member/identity">您的身份</a></li>
                <li><a href="{{DOMAIN}}member/identity/create">增加身份</a></li>
                <li><a href="{{DOMAIN}}member/contact">联系人</a></li>
                {{--<li><a href="user-profile.html">您的推荐</a></li>--}}
                {{--<li><a href="user-profile.html">您的接待</a></li>--}}
                {{--<li><a href="user-profile.html">您的培训</a></li>--}}
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>自定流程</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{DOMAIN}}member/farm">单子列表</a></li>
                <li><a href="{{DOMAIN}}member/farm/create">添加单子</a></li>
                <li><a href="{{DOMAIN}}member/farmDemand">账号列表</a></li>
                <li><a href="{{DOMAIN}}member/farmSupply">主持列表</a></li>
            </ul>
        </li>
        {{--<li>--}}
            {{--<a class="dropdown-toggle" href="#">--}}
                {{--<i class="icon-th-large"></i>--}}
                {{--<span>单子列表</span>--}}
                {{--<i class="icon-chevron-down"></i>--}}
            {{--</a>--}}
            {{--<ul class="submenu">--}}
                {{--<li><a href="user-list.html">主持</a></li>--}}
                {{--<li><a href="user-list.html">单子</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="chart-showcase.html">--}}
                {{--<i class="icon-signal"></i>--}}
                {{--<span>单子流程</span>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
</div>