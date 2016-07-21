@extends('admin.main')
@section('content')
    <div class="row" style="margin:0;">
        <div class="col-lg-6 table_w">
            <h2>会员查询 ({{ count($datas) }})</h2>

            <div class="form-group">
                <label>会员(昵称)</label>
                <input type="text" class="form-control" placeholder="不少于2个字符" name="name" value="{{ $uname }}">
                <p class="help-block star" id="name">
                    {{ count($datas) ? "找到".count($datas)."个身份" : "没有找到会员，继续查找" }}
                </p>
                <button type="button" class="btn btn-default" id="search">立即查找</button>
            </div>
            <hr>
            <script>
                $(document).ready(function(){
                    var name = $("input[name='name']");
                    $("#search").click(function(){
                        if (name.val()!='' && (name.val().length<2 || name.val().length>6)) {
                            $("#name").html("昵称在2-6个字符之间！");
                        } else if (name.val().length>=2 && name.val().length<=6) {
                            window.location.href = "{{DOMAIN}}lhadmin/"+name.val()+"/identity";
                        } else if (name.val()=='') {
                            window.location.href = "{{DOMAIN}}lhadmin/identity";
                        }
                    });
                });
            </script>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table_center">
                    <thead>
                @if(count($datas))
                    <tr>
                        <th>昵称</th>
                        <th>类型</th>
                        <th>资料完整度</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas))
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->getUserName() }}</td>
                        <td>{{ $data->genreName() }}</td>
                        <td>{{ $data->datum() }}</td>
                        <td>
                            <button class="btn btn-default"
                                    onclick="window.location.href='{{DOMAIN}}lhadmin/'+{{ $data->uid }}+'/identity/'+{{ $data->id }}+'/edit';">修改
                            </button>
                        </td>
                    </tr>
                        @endforeach
                    @endif
                    @if(count($datas)<count($model['genres']))
                    <tr>
                        <td colspan="4">
                            {{--<a href="/lhadmin/admin/create">添加管理员</a>--}}
                            <button class="btn btn-default"
                                    onclick="window.location.href='{{DOMAIN}}lhadmin/'+{{ $data->uid }}+'/identity/create';">添加身份</button>
                        </td>
                    </tr>
                    @endif
                @else
                    <tr><td>没有信息</td></tr>
                @endif
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.layout.info')
    </div>
@stop