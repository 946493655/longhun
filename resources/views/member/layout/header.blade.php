{{--会员顶部--}}


<!-- navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="brand" href="{{DOMAIN}}member">
            {{--<img src="{{PUB}}detail-admin/img/logo.png" />--}}
            <span style="font-family:'黑体';">龙魂-会员</span>
        </a>

        <ul class="nav pull-right">
            {{--<li class="hidden-phone">--}}
                {{--<input class="search" type="text" />--}}
            {{--</li>--}}
            {{--<li class="notification-dropdown hidden-phone">--}}
                {{--<a href="#" class="trigger">--}}
                    {{--<i class="icon-warning-sign"></i>--}}
                    {{--<span class="count">8</span>--}}
                {{--</a>--}}
                {{--<div class="pop-dialog">--}}
                    {{--<div class="pointer right">--}}
                        {{--<div class="arrow"></div>--}}
                        {{--<div class="arrow_border"></div>--}}
                    {{--</div>--}}
                    {{--<div class="body">--}}
                        {{--<a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>--}}
                        {{--<div class="notifications">--}}
                            {{--<h3>You have 6 new notifications</h3>--}}
                            {{--<a href="#" class="item">--}}
                                {{--<i class="icon-signin"></i> New user registration--}}
                                {{--<span class="time"><i class="icon-time"></i> 13 min.</span>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="item">--}}
                                {{--<i class="icon-signin"></i> New user registration--}}
                                {{--<span class="time"><i class="icon-time"></i> 18 min.</span>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="item">--}}
                                {{--<i class="icon-envelope-alt"></i> New message from Alejandra--}}
                                {{--<span class="time"><i class="icon-time"></i> 28 min.</span>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="item">--}}
                                {{--<i class="icon-signin"></i> New user registration--}}
                                {{--<span class="time"><i class="icon-time"></i> 49 min.</span>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="item">--}}
                                {{--<i class="icon-download-alt"></i> New order placed--}}
                                {{--<span class="time"><i class="icon-time"></i> 1 day.</span>--}}
                            {{--</a>--}}
                            {{--<div class="footer">--}}
                                {{--<a href="#" class="logout">View all notifications</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>--}}
            {{--邮箱--}}
            {{--<li class="notification-dropdown hidden-phone">--}}
                {{--<a href="#" class="trigger">--}}
                    {{--<i class="icon-envelope-alt"></i>--}}
                {{--</a>--}}
                {{--<div class="pop-dialog">--}}
                    {{--<div class="pointer right">--}}
                        {{--<div class="arrow"></div>--}}
                        {{--<div class="arrow_border"></div>--}}
                    {{--</div>--}}
                    {{--<div class="body">--}}
                        {{--<a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>--}}
                        {{--<div class="messages">--}}
                            {{--<a href="#" class="item">--}}
                                {{--<img src="img/contact-img.png" class="display" />--}}
                                {{--<div class="name">Alejandra Galván</div>--}}
                                {{--<div class="msg">--}}
                                    {{--There are many variations of available, but the majority have suffered alterations.--}}
                                {{--</div>--}}
                                {{--<span class="time"><i class="icon-time"></i> 13 min.</span>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="item">--}}
                                {{--<img src="img/contact-img2.png" class="display" />--}}
                                {{--<div class="name">Alejandra Galván</div>--}}
                                {{--<div class="msg">--}}
                                    {{--There are many variations of available, have suffered alterations.--}}
                                {{--</div>--}}
                                {{--<span class="time"><i class="icon-time"></i> 26 min.</span>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="item last">--}}
                                {{--<img src="img/contact-img.png" class="display" />--}}
                                {{--<div class="name">Alejandra Galván</div>--}}
                                {{--<div class="msg">--}}
                                    {{--There are many variations of available, but the majority have suffered alterations.--}}
                                {{--</div>--}}
                                {{--<span class="time"><i class="icon-time"></i> 48 min.</span>--}}
                            {{--</a>--}}
                            {{--<div class="footer">--}}
                                {{--<a href="#" class="logout">View all messages</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--账户信息--}}
            <li class="dropdown" style="font-size:18px;font-family:'黑体';">
                <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown" title="点击二级菜单">
                    {{ \Session::has('user') ? \Session::get('user.username') : '' }}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">账户设置</a></li>
                    <li><a href="#">密码修改</a></li>
                </ul>
            </li>
            {{--设置--}}
            {{--<li class="settings hidden-phone">--}}
                {{--<a href="personal-info.html" role="button">--}}
                    {{--<i class="icon-cog"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="settings hidden-phone">
                <a href="{{DOMAIN}}logout" role="button">
                    <i class="icon-share-alt"><span style="font-family:'黑体';">退出</span></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end navbar -->