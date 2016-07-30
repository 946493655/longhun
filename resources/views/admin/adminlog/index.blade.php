@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>管理员日志</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>管理员昵称</th>
                        <th>管理员类型</th>
                        <th>登录时间</th>
                        <th>退出时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas))
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->adminUserName() }}</td>
                        <td>{{ $data->adminGenreName() }}</td>
                        <td>{{ $data->loginTime() }}</td>
                        <td>{{ $data->logoutTime() }}</td>
                    </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @include('admin.layout.page')
            </div>
        </div>
        @include('admin.layout.info')
    </div>
@stop