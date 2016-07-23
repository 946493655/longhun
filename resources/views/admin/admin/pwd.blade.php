@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 table_w">
            <div class="form-group">
                <label>当前密码</label> &nbsp; {{ $data->ispwd() }}
            </div>

            <div class="form-group">
                <label>输入原密码</label> &nbsp;(<span class="star">*</span>)
                <input type="text" class="form-control" placeholder="6-20个字符" name="pwd1">
            </div>

            <div class="form-group">
                <label>输入新密码</label> &nbsp;(<span class="star">*</span>)
                <input type="text" class="form-control" placeholder="6-20个字符" name="pwd2">
            </div>

            <div class="form-group">
                <p class="help-block star" id="pwd"></p>
            </div>

            <button class="btn btn-default" id="submit">保存密码</button>
        </div>
        @include('admin.layout.info')
    </div>

    <script>
        $(document).ready(function(){
            $("#submit").click(function(){
                var pwd1 = $("input[name='pwd1']").val();
                var pwd2 = $("input[name='pwd2']").val();
                if (pwd1=='' || pwd2=='') {
                    $("#pwd").html("原密码或新密码必填！");
                    return;
                } else if (pwd1.length<6 || pwd1.length>20) {
                    $("#pwd").html("原密码必须6-20位！");
                    return;
                } else if (pwd2.length<6 || pwd2.length>20) {
                    $("#pwd").html("新密码必须6-20位！");
                    return;
                } else {
                    $("#pwd").html("");
                }
                window.location.href = '{{DOMAIN}}lhadmin/admin/setPwd/'+pwd1+'/'+pwd2;
            });
        });
    </script>
@stop