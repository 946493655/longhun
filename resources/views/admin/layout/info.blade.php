{{--右侧登录信息--}}


<div class="col-lg-6" style="width:25%;border:1px solid rgba(240,240,240,1);border-radius:5px;float:right;">
@if(\Session::has('admin'))
    <h3>登录人：{{ \Session::get('admin.username') }}</h3>
    <p>管理类型：{{ \Session::get('admin.genre') }}</p>
    <p>登录时间：{{ date('Y年m月d日 H:i',\Session::get('admin.loginTime')) }}</p>
    <p>上次登录：{{ \Session::get('admin.lastLogin') ? date('Y年m月d日 H:i',\Session::get('admin.lastLogin')) : '首次登录' }}</p>
@endif
    {{--<p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>--}}
</div>