@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        {{--<div class="col-lg-6">--}}
            <h2>管理员列表 ({{ count($datas) }})</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>类型</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas))
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->getUserName() }}</td>
                        <td>{{ $data->getUserGenreName() }}</td>
                        <td>
                        </td>
                    </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="4" style="text-align:center;">
                            <a href="/lhadmin/admin/create">添加管理员</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        {{--</div>--}}
    </div>
@stop