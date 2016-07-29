@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper">
            <div class="table-wrapper products-table section" style="font-family:'黑体';">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4 style="float:left;">联系人(推荐、接待、培训)</h4>
                        {{--<div class="pull-right">--}}
                            {{--<a class="btn-flat success new-product" href="{{DOMAIN}}member/contact/create">+ 添加联系人</a>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <span class="line"></span>昵称
                            </th>
                            <th class="span3">
                                <span class="line"></span>类型
                            </th>
                            <th class="span3">
                                <span class="line"></span>IS昵称
                            </th>
                            <th class="span3">
                                <span class="line"></span>创建时间
                            </th>
                            <th class="span3">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($datas))
                            @foreach($datas as $data)
                        <tr class="first">
                            <td>{{ $data->getUserName() }}</td>
                            <td class="description">{{ $data->genreName() }}</td>
                            <td class="description">{{ $data->is_name }}</td>
                            <td class="description">{{ $data->createTime() }}</td>
                            <td>
                                <a href="{{DOMAIN}}member/contact/{{ $data->id }}" class="btn btn-default">查看</a>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{--@include('member.layout.page')--}}
                </div>
            </div>
        </div>
    </div>
@stop