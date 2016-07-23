@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>会员{{ $data->username }}详情</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                    <tr>
                        <th>昵称</th>
                        <th>真实姓名</th>
                        <th>身份数量</th>
                        <th>密码更新</th>
                        <th>添加时间</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->realname }}</td>
                            <td>{{ count($data->getUserIdentity()) }}</td>
                            <td>{{ $data->ispwd() }}</td>
                            <td>{{ $data->createTime() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.layout.info')
    </div>
@stop