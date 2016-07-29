@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <h3 style="font-family:'黑体';">主持添加</h3><br>
                <div class="span8 column" style="width:100%;">
                <form action="{{DOMAIN}}member/farmSupply" method="POST" enctype="multipart/form-data"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="field-box">
                        <label>IS号码:</label>
                        <input class="span8" type="text" placeholder="" pattern="^\d+$" minlength="2" required name="is_number"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>IS账号:</label>
                        <input class="span8" type="text" placeholder="" pattern="^\d+$" minlength="2" required name="is_account"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>IS昵称:</label>
                        <input class="span8" type="text" placeholder="" minlength="2" required name="is_name"/>
                        <p>提示：自动加上前后缀，例：莉莉 ==> 丿龍魂丶莉莉『２H㊣主持』</p>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-default">保存添加</button>
                    <button class="btn btn-default" onclick="history.go(-1);">返回</button>
                </form>
                </div>
                @include('member.farm.info')
            </div>
        </div>
    </div>
@stop