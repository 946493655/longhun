@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count($users) }}</div>
                            <div>会员</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer" onclick="window.location.href='{{DOMAIN}}lhadmin/user';">
                        <span class="pull-left">详情</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count($farms) }}</div>
                            <div>自定义单子</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer" onclick="window.location.href='{{DOMAIN}}lhadmin/farm';">
                        <span class="pull-left">详情 </span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="panel panel-red">--}}
                {{--<div class="panel-heading">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-3">--}}
                            {{--<i class="fa fa-support fa-5x"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-9 text-right">--}}
                            {{--<div class="huge">13</div>--}}
                            {{--<div>卡劵</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a href="#">--}}
                    {{--<div class="panel-footer">--}}
                        {{--<span class="pull-left">详情 </span>--}}
                        {{--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        @include('admin.layout.info')
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>用户日志 </h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <span class="badge">一日内</span>
                            <i class="fa fa-fw fa-calendar"></i> 活跃会员
                        </a>
                    </div>
                    <div class="text-right">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" style="text-align:center;">
                                <thead>
                                <tr>
                                    <th>昵称</th>
                                    <th>登录时间</th>
                                    <th>退出时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($userlogs))
                                    @foreach($userlogs as $userlog)
                                <tr>
                                    <td>{{ $userlog->userName() }}</td>
                                    <td>{{ $userlog->loginTime() }}</td>
                                    <td>{{ $userlog->logoutTime() }}</td>
                                </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" style="text-align:center;">没有记录</td></tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <a href="{{DOMAIN}}lhadmin/userlog">所有活动 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> 交易 </h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <span class="badge">最新记录</span>
                            <i class="fa fa-fw fa-calendar"></i> 最新5条
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>类型</th>
                                <th>发布人</th>
                                <th>主持</th>
                                <th>佣金</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($farms))
                                @foreach($farms as $farm)
                            <tr>
                                <td>{{ $farm->genreName() }}</td>
                                <td>{{ $farm->getUserName() }}</td>
                                <td>{{ $farm->supplyIsNameNoVest() }}</td>
                                <td>{{ $farm->money() }}</td>
                                <td>{{ $farm->statusName() }}</td>
                            </tr>
                                @endforeach
                            @else
                                <tr><td colspan="5" style="text-align:center;">没有记录</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="{{DOMAIN}}lhadmin/farm">所有交易 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{--@include('admin.layout.info')--}}
    </div>
@stop