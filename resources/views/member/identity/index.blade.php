@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper">
            <div class="table-wrapper products-table section" style="font-family:'黑体';">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4 style="float:left;">身份列表</h4>
                        <div class="pull-right">
                            <a class="btn-flat success new-product" href="{{DOMAIN}}member/identity/create">+ 添加身份</a>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:50px;">ID</th>
                            <th class="span3">
                                <span class="line"></span>类型
                            </th>
                            <th class="span3">
                                <span class="line"></span>qq
                            </th>
                            <th class="span3">
                                <span class="line"></span>手机
                            </th>
                            <th class="span3">
                                <span class="line"></span>创建时间
                            </th>
                            <th class="span3" style="width:30%;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($datas))
                            @foreach($datas as $data)
                        <tr class="first">
                            <td>
                                <label><input type="checkbox"/> {{ $data->id }}</label>
                            </td>
                            <td>
                                <a href="{{DOMAIN}}member/identity/{{ $data->id }}" class="name">{{ $data->genreName() }}</a>
                            </td>
                            <td class="description">{{ $data->qq }}</td>
                            <td class="description">{{ $data->mobile }}</td>
                            <td class="description">{{ $data->createTime() }}</td>
                            <td>
                                <a href="{{DOMAIN}}member/identity/{{ $data->id }}" class="btn btn-default">查看</a>
                                <a href="{{DOMAIN}}member/identity/{{ $data->id }}/edit" class="btn btn-default">修改</a>
                                {{--<a href="{{DOMAIN}}member/identity/{{ $data->id }}/destroy" class="btn btn-default">删除</a>--}}
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop