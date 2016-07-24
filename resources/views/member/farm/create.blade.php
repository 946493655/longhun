@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <h3 style="font-family:'黑体';">自定义单子创建</h3><br>
                <div class="span8 column" style="width:100%;">
                <form action="{{DOMAIN}}member/farm" method="POST" enctype="multipart/form-data"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="field-box">
                        <label>单子类型：</label>
                        <div class="ui-select">
                            <select name="genre" required>
                                @foreach($model['genres'] as $kgenre=>$vgenre)
                                <option value="{{ $kgenre }}"/>{{ $vgenre }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>等级：</label>
                        <div class="ui-select">
                            <select name="level" required>
                                @foreach($model['levels'] as $klevel=>$vlevel)
                                <option value="{{ $klevel }}"/>{{ $vlevel }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>价格:(元)</label>
                        <input class="span8" type="text" placeholder="做单子的佣金，例：5.10" pattern="^(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)$" required name="money"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>内容要求:</label>
                        <textarea class="span8" rows="4" placeholder="输入单子的要求，最多250字字符" required maxlength="250" name="intro"></textarea>
                        <p>还可以输入 <span id="number">250</span> 字符</p>
                    </div>

                    <button type="submit" class="btn btn-default">保存添加</button>
                </form>
                </div>
                {{--@include('member.layout.info')--}}
                <div class="col-lg-6" style="padding:20px;width:25%;font-family:'黑体';border:1px solid rgba(240,240,240,1);border-radius:5px;float:right;position:absolute;left:70%;">
                    @if(\Session::has('user'))
                        <h3>登录昵称：{{ \Session::get('user.username') }}</h3><br>
                        <p>登录时间：{{ date('Y年m月d日 H:i',\Session::get('user.loginTime')) }}</p>
                        <p>上次登录：{{ \Session::get('user.lastLogin') ? date('Y年m月d日 H:i',\Session::get('user.lastLogin')) : '首次登录' }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("textarea[name='intro']").change(function(){
                $("#number").html(250-$(this).val().length*1);
            });
        });
    </script>
@stop