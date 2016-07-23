@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>管理员列表 ({{ count($datas) }})</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                    <tr>
                        <th>昵称</th>
                        <th>类型</th>
                        <th>密码更新</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas))
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->genreName() }}</td>
                        <td>{{ $data->ispwd() }}</td>
                        <td>{{ $data->createTime() }}</td>
                        <td>
                            <button class="btn btn-default"
                                    onclick="window.location.href='{{DOMAIN}}lhadmin/admin/'+{{ $data->id }}+'/edit';">修改
                            </button>
                            {{--<button class="btn btn-default"--}}
                                    {{--onclick="window.location.href='{{DOMAIN}}lhadmin/admin/'+{{ $data->id }}+'/pwd';">密码--}}
                            {{--</button>--}}
                        </td>
                    </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="10">
                            {{--<a href="/lhadmin/admin/create">添加管理员</a>--}}
                            <button class="btn btn-default"
                                    onclick="window.location.href='{{DOMAIN}}lhadmin/admin/create';">添加管理员</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.layout.info')
    </div>
@stop