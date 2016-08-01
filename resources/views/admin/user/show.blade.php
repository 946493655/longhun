@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>会员{{ $data->username }}详情</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <tbody>
                    <tr>
                        <td>昵称</td>
                        <td>{{ $data->username }}</td>
                    </tr>
                    <tr>
                        <td>真实姓名</td>
                        <td>{{ $data->realname }}</td>
                    </tr>
                    <tr>
                        <td>身份数量</td>
                        <td>{{ count($data->getUserIdentity()) }}</td>
                    </tr>
                    <tr>
                        <td>密码更新</td>
                        <td>{{ $data->ispwd() }}</td>
                    </tr>
                    <tr>
                        <td>添加时间</td>
                        <td>{{ $data->createTime() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.layout.info')
    </div>
@stop