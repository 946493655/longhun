@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper">
            <div class="table-wrapper products-table section" style="font-family:'黑体';">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>自定义流程单子</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <div class="ui-select">
                            <select name="genre">
                                @foreach($model['genres'] as $kgenre=>$vgenre)
                                <option value="{{ $kgenre }}">{{ $vgenre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" class="search" />
                        <a class="btn-flat success new-product" href="{{DOMAIN}}member/farm/create">+ Add product</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            {{--<th class="span3">--}}
                                {{--<input type="checkbox"/> ID--}}
                            {{--</th>--}}
                            <th style="width:50px;">ID</th>
                            <th class="span3" class="span3">
                                <span class="line"></span>类型
                            </th>
                            <th class="span3">
                                <span class="line"></span>价格
                            </th>
                            <th class="span3">
                                <span class="line"></span>内容
                            </th>
                            <th class="span3">
                                <span class="line"></span>状态
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
                            <td>
                                {{--<div class="img">--}}
                                    {{--<img src="{{DOMAIN}}detail-admin/img/table-img.png"/>--}}
                                {{--</div>--}}
                                <a href="{{DOMAIN}}member/farm/{{ $data->id }}" class="name">{{ $data->genreName() }}</a>
                            </td>
                            <td class="description">{{ $data->money() }}</td>
                            <td class="description">{{ str_limit($data->intro,20) }}</td>
                            <td class="description">{{ $data->statusName() }}</td>
                            <td class="description">{{ $data->createTime() }}</td>
                            <td>
                                {{--<span class="label label-success">Active</span>--}}
                                {{--<ul class="actions">--}}
                                    {{--<li><a href="#">修改</a></li>--}}
                                    {{--<li class="last"><a href="#">删除</a></li>--}}
                                {{--</ul>--}}
                                <a href="{{DOMAIN}}member/farm/{{ $data->id }}/edit" class="btn btn-default">修改</a>
                                <a href="{{DOMAIN}}member/farm/{{ $data->id }}/destroy" class="btn btn-default">删除</a>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        {{--<tr>--}}
                            {{--<td>--}}
                                {{--<input type="checkbox" />--}}
                                {{--<div class="img">--}}
                                    {{--<img src="{{DOMAIN}}detail-admin/img/table-img.png" />--}}
                                {{--</div>--}}
                                {{--<a href="#" class="name">Internet tend</a>--}}
                            {{--</td>--}}
                            {{--<td class="description">--}}
                                {{--There are many variations of passages.--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<span class="label label-info">Standby</span>--}}
                                {{--<ul class="actions">--}}
                                    {{--<li><a href="#">Edit</a></li>--}}
                                    {{--<li class="last"><a href="#">Delete</a></li>--}}
                                {{--</ul>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>--}}
                                {{--<input type="checkbox" />--}}
                                {{--<div class="img">--}}
                                    {{--<img src="{{DOMAIN}}detail-admin/img/table-img.png" />--}}
                                {{--</div>--}}
                                {{--<a href="#" class="name">Internet tend</a>--}}
                            {{--</td>--}}
                            {{--<td class="description">--}}
                                {{--There are many variations of passages.--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<ul class="actions">--}}
                                    {{--<li><a href="#">Edit</a></li>--}}
                                    {{--<li class="last"><a href="#">Delete</a></li>--}}
                                {{--</ul>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop