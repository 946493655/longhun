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
                            <h6>Biography</h6>
                            <p>There are many variations of passages of Lorem Ipsum available but the majority have humour suffered alteration in believable some formhumour , by injected humour, or randomised words which don't look even slightly believable. </p>
                        </div>

                        {{--环图表--}}
                        @include('member.home.ring')

                        {{--以下是列表--}}
                        <h6>今日订单 Today Order</h6>
                        <br />
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="span2">
                                    Order ID
                                </th>
                                <th class="span3">
                                    <span class="line"></span>
                                    Date
                                </th>
                                <th class="span3">
                                    <span class="line"></span>
                                    Items
                                </th>
                                <th class="span3">
                                    <span class="line"></span>
                                    Total amount
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    <a href="#">#459</a>
                                </td>
                                <td>
                                    Jan 03, 2014
                                </td>
                                <td>
                                    3
                                </td>
                                <td>
                                    $ 3,500.00
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- 下面输入框 -->
                        <div class="span12 section comment">
                            <h6>Add a quick note</h6>
                            <p>Add a note about this user to keep a history of your interactions.</p>
                            <textarea></textarea>
                            <a href="#">Attach files</a>
                            <div class="span12 submit-box pull-right">
                                <input type="submit" class="btn-glow primary" value="Add Note" />
                                <span>OR</span>
                                <input type="reset" value="Cancel" class="reset" />
                            </div>
                        </div>
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