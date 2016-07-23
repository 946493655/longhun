@extends('member.main')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{PUB}}detail-admin/css/compiled/user-profile.css" />

    <div class="container-fluid">
        <!-- 4个数字 -->
        @include('member.home.four')

        <div id="pad-wrapper" class="user-profile">
            <!-- header -->
            <div class="row-fluid header">
                <div class="span8">
                    <img src="{{PUB}}detail-admin/img/contact-profile.png" class="avatar img-circle" />
                    <h3 class="name">Alejandra Galván Castillo</h3>
                    <span class="area">Graphic Designer</span>
                </div>
                <a class="btn-flat icon pull-right delete-user" data-toggle="tooltip" title="Delete user" data-placement="top">
                    <i class="icon-trash"></i>
                </a>
                <a class="btn-flat icon large pull-right edit">
                    Edit this person
                </a>
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
                        <div class="row-fluid section">
                            <h4 class="title">jQuery Knob</h4>
                            <div class="row-fluid">
                                <div class="span3">
                                    <input type="text" value="50" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#30a1ec" data-bgcolor="#d4ecfd" data-width="140" />
                                </div>
                                <div class="span3">
                                    <input type="text" value="75" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#8ac368" data-bgcolor="#c4e9aa" data-width="140" />
                                </div>
                                <div class="span3">
                                    <input type="text" value="35" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#5ba0a3" data-bgcolor="#cef3f5" data-width="140" />
                                </div>
                                <div class="span3">
                                    <input type="text" value="85" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#b85e80" data-bgcolor="#f8d2e0" data-width="140" />
                                </div>
                            </div>
                        </div>

                        {{--以下是列表--}}
                        <h6>Recent orders</h6>
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
                <div class="span3 address pull-right">
                    <h6>Address</h6>
                    <iframe width="300" height="133" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/?ie=UTF8&amp;t=m&amp;ll=19.715081,-155.071421&amp;spn=0.010746,0.025749&amp;z=14&amp;output=embed"></iframe>
                    <ul>
                        <li>2301 East Lamar Blvd. Suite 140. </li>
                        <li>City, Arlington. United States,</li>
                        <li>Zip Code, TX 76006.</li>
                        <li class="ico-li">
                            <i class="ico-phone"></i>
                            1817 274 2933
                        </li>
                        <li class="ico-li">
                            <i class="ico-mail"></i>
                            <a href="#">alejandra@detailcanvas.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop