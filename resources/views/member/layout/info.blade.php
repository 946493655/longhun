{{--右侧登录信息--}}


<div class="col-lg-6" style="padding:20px;width:20%;font-family:'黑体';border:1px solid rgba(240,240,240,1);border-radius:5px;float:right;">
@if(\Session::has('user'))
    <h3>登录昵称：{{ \Session::get('user.username') }}</h3><br>
    <p>登录时间：{{ date('Y年m月d日 H:i',\Session::get('user.loginTime')) }}</p>
    <p>上次登录：{{ \Session::get('user.lastLogin') ? date('Y年m月d日 H:i',\Session::get('user.lastLogin')) : '首次登录' }}</p>
@endif
    {{--<p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>--}}
</div>