@extends('member.main')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{PUB}}detail-admin/css/compiled/user-profile.css" />

    <div class="container-fluid">
        <!-- 4个数字 -->
        @include('member.home.four')

        <div id="pad-wrapper" class="user-profile">
            <!-- header -->
            <div class="row-fluid header">
                <div class="span8" style="font-family:'黑体';">
                    <img src="{{PUB}}detail-admin/img/contact-profile.png" class="avatar img-circle" />
                    <h3 class="name">九哥 - 九哥</h3>
                    <span class="area">杭州 滨江</span>
                </div>
                {{--<a class="btn-flat icon pull-right delete-user" data-toggle="tooltip" title="Delete user" data-placement="top">--}}
                    {{--<i class="icon-trash"></i>--}}
                {{--</a>--}}
                <a class="btn-flat icon large pull-right edit" href="{{DOMAIN}}member/user">修改信息</a>
            </div>

            <div class="row-fluid profile">
                <div class="span9 bio">
                    <div class="profile-box">
                        <!--个人信息-->
                        <div class="span12 section">
                            <h6>{{--Biography--}}简介</h6>
                            <p>{{ $user->intro() }}</p>
                        </div>

                        {{--环图表--}}
                        @include('member.home.ring')

                        {{--以下是列表--}}
                        <h6>一日内单子 Today Ago</h6>
                        <br />
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="span2"> 类型 </th>
                                <th class="span3">
                                    <span class="line"></span> 发布人
                                </th>
                                <th class="span3">
                                    <span class="line"></span> 主持
                                </th>
                                <th class="span3">
                                    <span class="line"></span> 佣金
                                </th>
                                <th class="span3">
                                    <span class="line"></span> 状态
                                </th>
                                <th class="span3">
                                    <span class="line"></span> 创建时间
                                </th>
                                <th class="span2"> 操作 </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($farms))
                                @foreach($farms as $farm)
                            <tr class="first">
                                <td>{{ $farm->genreName() }}</td>
                                <td>{{ $farm->getUserName() }}</td>
                                <td>{{ $farm->supplyIsName/*NoVest*/() }}</td>
                                <td>{{ $farm->money() }}</td>
                                <td>{{ $farm->statusName() }}</td>
                                <td>{{ $farm->createTime() }}</td>
                                <td><a href="{{DOMAIN}}lhadmin/farm/{{ $farm->id }}" class="btn btn-default">详情</a></td>
                            </tr>
                                @endforeach
                            @else <tr><td colspan="4" style="text-align:center;">没有记录</td></tr>
                            @endif
                            </tbody>
                        </table>

                        <!-- 下面输入框 -->
                        {{--<div class="span12 section comment">--}}
                            {{--<h6>做个记事</h6>--}}
                            {{--<p>Add a note about this user to keep a history of your interactions.</p>--}}
                            {{--<textarea></textarea>--}}
                            {{--<a href="#">Attach files</a>--}}
                            {{--<div class="span12 submit-box pull-right">--}}
                                {{--<input type="submit" class="btn-glow primary" value="Add Note" />--}}
                                {{--<span>OR</span>--}}
                                {{--<input type="reset" value="Cancel" class="reset" />--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <!-- 右侧信息 -->
                @include('member.layout.info')
                {{--<div class="span3 address pull-right">--}}
                    {{--<h6>Address</h6>--}}
                    {{--<iframe width="300" height="133" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/?ie=UTF8&amp;t=m&amp;ll=19.715081,-155.071421&amp;spn=0.010746,0.025749&amp;z=14&amp;output=embed"></iframe>--}}
                    {{--<ul>--}}
                        {{--<li>2301 East Lamar Blvd. Suite 140. </li>--}}
                        {{--<li>City, Arlington. United States,</li>--}}
                        {{--<li>Zip Code, TX 76006.</li>--}}
                        {{--<li class="ico-li">--}}
                            {{--<i class="ico-phone"></i>--}}
                            {{--1817 274 2933--}}
                        {{--</li>--}}
                        {{--<li class="ico-li">--}}
                            {{--<i class="ico-mail"></i>--}}
                            {{--<a href="#">alejandra@detailcanvas.com</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@stop