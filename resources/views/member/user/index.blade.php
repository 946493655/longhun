@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid">
                <h3 style="font-family:'黑体';">会员资料</h3><br>
                <table class="table table-hover" style="width:70%;float:left;">
                    <tbody>
                        <tr>
                            <td style="width:40%;"><label>昵称：</label></td>
                            <td>{{ $data->username }}</td>
                        </tr>
                        <tr>
                            <td><label>真实姓名：</label></td>
                            <td>{{ $data->realname }}</td>
                        </tr>
                        <tr>
                            <td><label>身份证号码：</label></td>
                            <td>{{ $data->idcard() }}</td>
                        </tr>
                        <tr>
                            <td><label>支付宝收款账号：</label></td>
                            <td>{{ $data->zfb() }}</td>
                        </tr>
                        <tr>
                            <td><label>手机号码：</label></td>
                            <td>{{ $data->mobile() }}</td>
                        </tr>
                        <tr>
                            <td><label>创建时间: </label></td>
                            <td>{{ $data->createTime() }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <button class="btn btn-default" onclick="history.go(-1);">返回</button>
                                <button class="btn btn-default" onclick="window.location.href='{{DOMAIN}}member/user/'+{{ $data->id }}+'/edit';">修改</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @include('member.layout.info')
            </div>
        </div>
    </div>
@stop