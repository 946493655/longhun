@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>单子详情</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <td>类型</td>
                            <td>{{ $data->genreName() }}</td>
                        </tr>
                        <tr>
                            <td>发布人</td>
                            <td>{{ $data->getUserName() }}</td>
                        </tr>
                        <tr>
                            <td>主持</td>
                            <td>{{ $data->supplyIsName() }}</td>
                        </tr>
                        <tr>
                            <td>佣金</td>
                            <td>{{ $data->money() }}</td>
                        </tr>
                        <tr>
                            <td>内容</td>
                            <td>{{ $data->intro }}</td>
                        </tr>
                        <tr>
                            <td>店铺或旺旺名称</td>
                            <td>{{ $data->supply_shop }}</td>
                        </tr>
                        <tr>
                            <td>宝贝价格</td>
                            <td>{{ $data->price() }}</td>
                        </tr>
                        <tr>
                            <td>状态</td>
                            <td>{{ $data->statusName() }}</td>
                        </tr>
                        <tr>
                            <td>备注</td>
                            <td>{{ $data->remarks() }}</td>
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