@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <h3 style="font-family:'黑体';">会员资料修改</h3><br>
                <div class="span8 column" style="width:100%;">
                <form action="{{DOMAIN}}member/user/{{ $data->id }}" method="POST" enctype="multipart/form-data"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">

                    <div class="field-box">
                        <label>支付宝收款账号：</label>
                        <input class="span8" type="text" placeholder="收款账号()" minlength="2" required name="zfb" value="{{ $data->zfb }}"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>手机：</label>
                        <input class="span8" type="text" placeholder="手机号码" pattern="^1[3|4|5|8]\d{9}$" required name="mobile" value="{{ $data->mobile }}"/>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-default">保存修改</button>
                </form>
                </div>
                @include('member.farm.info')
            </div>
        </div>
    </div>
@stop