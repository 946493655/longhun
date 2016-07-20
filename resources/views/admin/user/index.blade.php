@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>会员列表 ({{ count($datas) }})</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>类型数</th>
                        <th>密码更新</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas))
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->username }}</td>
                        <td>{{ count($data->getUserIdentity()) }}</td>
                        <td>{{ $data->ispwd() }}</td>
                        <td>
                            <button class="btn btn-default"
                                    onclick="window.location.href='/lhadmin/user/'+{{ $data->id }};">详情
                            </button>
                            <button class="btn btn-default"
                                    onclick="window.location.href='/lhadmin/user/'+{{ $data->id }}+'/edit';">修改
                            </button>
                        </td>
                    </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="4">
                            {{--<a href="/lhadmin/admin/create">添加管理员</a>--}}
                            <button class="btn btn-default"
                                    onclick="window.location.href='/lhadmin/user/create';">添加会员</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.layout.info')
    </div>
@stop