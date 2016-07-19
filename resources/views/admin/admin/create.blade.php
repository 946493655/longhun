@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form role="form">
                <div class="form-group">
                    <label>昵称</label>
                    <input type="text" class="form-control" placeholder="2-6个字符" name="name">
                    {{--<p class="help-block" style="color:red;" id="name"></p>--}}
                </div>

                <div class="form-group">
                    <label>真实姓名</label>
                    <input type="text" class="form-control" placeholder="不少于2个字符" name="realname">
                </div>

                <div class="form-group">
                    <label>类型</label>
                    <br>
                    @foreach($model['genres'] as $kgenre=>$vgenre)
                    <label class="radio-inline">
                        <input type="radio" name="genre" id="optionsRadiosInline1" value="{{ $kgenre }}" {{ $kgenre==1 ? 'checked' : '' }}> {{ $vgenre }}
                    </label>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-default"><label>添加</label></button>
            </form>
        </div>
        @include('admin.layout.info')
    </div>
@stop