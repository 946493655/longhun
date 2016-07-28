@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <h3 style="font-family:'黑体';">身份添加</h3><br>
                <div class="span8 column" style="width:100%;">
                <form action="{{DOMAIN}}member/identity" method="POST" enctype="multipart/form-data"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="field-box">
                        <label>身份选择：</label>
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
                        <label>qq:</label>
                        <input class="span8" type="text" placeholder="qq号码" pattern="^\d{5,}$" required name="qq"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>手机:</label>
                        <input class="span8" type="text" placeholder="手机号码" pattern="^1[3|4|5|8]\d{9}$" required name="mobile"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>淘宝账号:</label>
                        <input class="span8" type="text" placeholder="" minlength="2" required name="taobao"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>支付宝账号:</label>
                        <input class="span8" type="text" placeholder="" minlength="2" required name="zfb"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>收货地址:</label>
                        <input class="span8" type="text" placeholder="" minlength="2" required name="address"/>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-default">保存添加</button>
                </form>
                </div>
                @include('member.farm.info')
            </div>
        </div>
    </div>
@stop