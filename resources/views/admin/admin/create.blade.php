@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 table_w">
            <form role="form" action="{{DOMAIN}}lhadmin/admin" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>昵称</label> &nbsp;(<span class="star">*</span>)
                    <input type="text" class="form-control" placeholder="2-6个字符" name="name">
                    <p class="help-block star" id="name"></p>
                </div>

                <div class="form-group">
                    <label>真实姓名</label> &nbsp;(<span class="star">*</span>)
                    <input type="text" class="form-control" placeholder="不少于2个字符" name="realname">
                    <p class="help-block star" id="realname"></p>
                </div>

                <div class="form-group">
                    <label>管理类型</label> &nbsp;(<span class="star">*</span>)
                    <br>
                    @foreach($model['genres'] as $kgenre=>$vgenre)
                        @if($kgenre)
                    <label class="radio-inline">
                        <input type="radio" name="genre" id="optionsRadiosInline1" value="{{ $kgenre }}" {{ $kgenre==1 ? 'checked' : '' }}> {{ $vgenre }}
                    </label>
                        @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <label>默认初始密码</label><br>a12345
                </div>

                <button type="submit" class="btn btn-default">保存添加</button>
            </form>
        </div>
        @include('admin.layout.info')
    </div>

    <script>
        $(document).ready(function(){
            $("input[name='name']").blur(function(){
                if ($(this).val()=='') { $("#name").html("昵称必填！"); }
                if ($(this).val().length<2 || $(this).val().length>6) {
                    $("#name").html("昵称在2-6个字符之间！");
                }
            });
            $("input[name='realname']").blur(function(){
                if ($(this).val()=='') { $("#realname").html("真实姓名必填！"); }
                if ($(this).val().length<2) {
                    $("#realname").html("真实姓名至少2个字符！");
                }
            });
        });
    </script>
@stop