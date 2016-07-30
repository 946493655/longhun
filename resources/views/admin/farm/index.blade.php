@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>自定义单子</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>类型</th>
                        <th>发布人</th>
                        <th>主持IS昵称</th>
                        <th>价格</th>
                        <th>内容</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas))
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->genreName() }}</td>
                        <td>{{ $data->getUserName() }}</td>
                        <td>{{ $data->supplyIsName() }}</td>
                        <td>{{ $data->money() }}</td>
                        <td>{{ str_limit($data->intro,20) }}</td>
                        <td>{{ $data->statusName() }}</td>
                        <td>{{ $data->createTime() }}</td>
                        <td>
                            <button class="btn btn-default"
                                    onclick="window.location.href='{{DOMAIN}}lhadmin/farm/{{ $data->id }}}';">查看</button>
                        </td>
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