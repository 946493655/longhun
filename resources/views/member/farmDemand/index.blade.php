@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper">
            <div class="table-wrapper products-table section" style="font-family:'黑体';">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4 style="float:left;">账号列表</h4>
                        <div class="pull-right">
                            <a class="btn-flat success new-product" href="{{DOMAIN}}member/farmDemand/create">+ 添加账号</a>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:50px;">ID</th>
                            <th class="span3">
                                <span class="line"></span>淘宝账号
                            </th>
                            <th class="span3">
                                <span class="line"></span>淘宝等级
                            </th>
                            <th class="span3">
                                <span class="line"></span>支付宝账号
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
                            <td>
                                <label><input type="checkbox"/> {{ $data->id }}</label>
                            </td>
                            <td class="description">{{ $data->taobao }}</td>
                            <td class="description">{{ $data->levelName() }}</td>
                            <td class="description">{{ $data->zfb }}</td>
                            <td class="description">{{ $data->createTime() }}</td>
                            <td>
                                <a href="{{DOMAIN}}member/farmDemand/{{ $data->id }}/edit" class="btn btn-default">修改</a>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @include('member.layout.page')
                </div>
            </div>
        </div>
    </div>
@stop