@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            {{--<h2>自定义单子</h2>--}}

            <div class="form-group">
                <label>会员昵称查询单子</label>
                &nbsp;&nbsp;
                <a href="{{DOMAIN}}lhadmin/farm">所有会员</a>
                <input type="text" class="form-control" placeholder="会员昵称" name="uname" value="{{ $uname }}">
                <p class="help-block star" id="name">
                    {{ count($datas) ? "找到".count($datas)."个身份" : "没有找到会员，继续查找" }}，总共{{ $datas->all }}个身份
                </p>
                <button type="button" class="btn btn-default" id="search">立即查找</button>
            </div>
            <hr>
            <script>
                $(document).ready(function(){
                    var uname = $("input[name='uname']");
                    $("#search").click(function(){
                        if (uname.val()!='') {
                            window.location.href = "{{DOMAIN}}lhadmin/farm/index/"+uname.val();
                        } else {
                            window.location.href = "{{DOMAIN}}lhadmin/farm";
                        }
                    });
                });
            </script>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>类型</th>
                        <th>发布人</th>
                        <th>主持IS昵称</th>
                        <th>价格</th>
                        {{--<th>内容</th>--}}
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
                        {{--<td>{{ str_limit($data->intro,20) }}</td>--}}
                        <td>{{ $data->statusName() }}</td>
                        <td>{{ $data->createTime() }}</td>
                        <td>
                            <button onclick="window.location.href='{{DOMAIN}}lhadmin/farm/{{ $data->id }}';"
                                    class="btn btn-default" style="padding:2px 15px;">查看</button>
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