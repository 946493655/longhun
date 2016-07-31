@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <h3 style="font-family:'黑体';">账号添加</h3><br>
                <div class="span8 column" style="width:100%;">
                <form action="{{DOMAIN}}member/farmDemand" method="POST" enctype="multipart/form-data"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="field-box">
                        <label>店铺名称或拍单旺旺:</label>
                        <input class="span8" type="text" placeholder="" minlength="2" required name="taobao"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>等级：</label>
                        <div class="ui-select">
                            <select name="tb_level" required>
                                @foreach($model['levels'] as $klevel=>$vlevel)
                                    <option value="{{ $klevel }}"/>{{ $vlevel }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>收款支付宝:</label>
                        <input class="span8" type="text" placeholder="" minlength="2" required name="zfb"/>
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