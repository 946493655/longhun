@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 table_w">
            <form role="form" action="/lhadmin/identity/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="uid" value="{{ $uid }}">
                {{--<div class="form-group">--}}
                    {{--<label>会员</label>--}}
                    {{--<select class="form-control" name="uid">--}}
                        {{--@if(count($model->users()))--}}
                        {{--@foreach($model->users() as $user)--}}
                            {{--<option value="{{ $user->id }}">{{ $user->username }}</option>--}}
                        {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</select>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label>会员类型</label> &nbsp;(<span class="star">*</span>)
                    <br>
                    @foreach($model['genres'] as $kgenre=>$vgenre)
                        <label class="radio-inline">
                            <input type="radio" name="genre" id="optionsRadiosInline1" value="{{ $kgenre }}" {{ $kgenre==$data->genre ? 'checked' : '' }}> {{ $vgenre }}
                        </label>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>qq</label>
                    <input type="text" class="form-control" placeholder="" name="qq" value="{{ $data->qq }}">
                </div>

                <div class="form-group">
                    <label>手机</label>
                    <input type="text" class="form-control" placeholder="" name="mobile" value="{{ $data->mobile }}">
                </div>

                <div class="form-group">
                    <label>淘宝账号</label>
                    <input type="text" class="form-control" placeholder="" name="taobao" value="{{ $data->taobao }}">
                </div>

                <div class="form-group">
                    <label>支付宝账号</label>
                    <input type="text" class="form-control" placeholder="" name="zfb" value="{{ $data->zfb }}">
                </div>

                <div class="form-group">
                    <label>地址</label>
                    <input type="text" class="form-control" placeholder="" name="address" value="{{ $data->address }}">
                </div>

                <button type="submit" class="btn btn-default">保存修改</button>
            </form>
        </div>
        @include('admin.layout.info')
    </div>
@stop