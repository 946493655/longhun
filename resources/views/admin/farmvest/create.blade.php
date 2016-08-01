@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 table_w">
            <form role="form" action="{{DOMAIN}}lhadmin/farmvest" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label>马甲前缀</label> &nbsp;(<span class="star">*</span>)
                    <input type="text" class="form-control" placeholder="2-6个字符" minlength="2" maxlength="6" required name="prefix">
                </div>

                <div class="form-group">
                    <label>团名称</label> &nbsp;(<span class="star">*</span>)
                    <input type="text" class="form-control" placeholder="2-6个字符" minlength="2" maxlength="6" required name="tuan">
                </div>

                <div class="form-group">
                    <label>马甲后缀</label> &nbsp;(<span class="star">*</span>)
                    <input type="text" class="form-control" placeholder="2-6个字符" minlength="2" maxlength="6" required name="suffix">
                </div>

                <div class="form-group">
                    <label>马甲备注</label>
                    <input type="text" class="form-control" placeholder="" name="remark">
                </div>

                <div class="form-group">
                    注意：<br>例：ＶＸ♔小咕噜『５团❤主持』广东 ==》 ＶＸ♔->前缀，小咕噜->会员昵称，５团❤->团名称，主持->后缀，广东->备注
                </div>

                <button type="submit" class="btn btn-default">保存添加</button>
            </form>
        </div>
        @include('admin.layout.info')
    </div>
@stop