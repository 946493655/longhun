@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid">
                <h3 style="font-family:'黑体';">自定义单子详情</h3><br>
                <table class="table table-hover" style="width:70%;float:left;">
                    <tbody>
                        <tr>
                            <td style="width:40%;"><label>单子类型：</label></td>
                            <td>{{ $data->genreName() }}</td>
                        </tr>
                        <tr>
                            <td><label>等级：</label></td>
                            <td>{{ $data->levelName() }}</td>
                        </tr>
                        <tr>
                            <td><label>价格: </label></td>
                            <td>{{ $data->money() }}</td>
                        </tr>
                        <tr>
                            <td><label>内容要求: </label></td>
                            <td>{{ str_limit($data->intro,20) }}</td>
                        </tr>
                        <tr>
                            <td><label>创建时间: </label></td>
                            <td>{{ $data->createTime() }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>单子状态：</td>
                            <td>{{ $data->statusName() }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <button class="btn btn-default" onclick="history.go(-1);">返回</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{--@include('member.layout.info')--}}
                <div class="col-lg-6" style="padding:20px;width:25%;font-family:'黑体';border:1px solid rgba(240,240,240,1);border-radius:5px;float:right;position:absolute;left:70%;">
                    @if(\Session::has('user'))
                        <h3>单子主持：{{ $data->user()->username }}</h3><br>
                        <p>登录昵称：{{ \Session::get('user.username') }}</p>
                        <p>登录时间：{{ date('Y年m月d日 H:i',\Session::get('user.loginTime')) }}</p>
                        <p>上次登录：{{ \Session::get('user.lastLogin') ? date('Y年m月d日 H:i',\Session::get('user.lastLogin')) : '首次登录' }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop