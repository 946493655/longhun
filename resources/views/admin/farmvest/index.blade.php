@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>马甲列表</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        {{--<th>马甲前缀</th>--}}
                        {{--<th>团名称</th>--}}
                        {{--<th>马甲后缀</th>--}}
                        <th>马甲格式</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas))
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        {{--<td>{{ $data->prefix }}</td>--}}
                        {{--<td>{{ $data->tuan }}</td>--}}
                        {{--<td>{{ $data->suffix }}</td>--}}
                        <td>{{ $data->vest() }}</td>
                        <td>{{ $data->createTime() }}</td>
                        <td>
                            <a href="{{DOMAIN}}lhadmin/farmvest/{{ $data->id }}/edit" class="btn btn-default" style="padding:2px 15px;">修改</a>
                        </td>
                    </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="10">
                            <button class="btn btn-default"
                                    onclick="window.location.href='{{DOMAIN}}lhadmin/farmvest/create';">添加马甲</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                @include('admin.layout.page')
            </div>
        </div>
        @include('admin.layout.info')
    </div>
@stop