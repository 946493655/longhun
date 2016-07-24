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
                            <th class="span3">
                                <input type="checkbox"/> ID
                            </th>
                            <th class="span3">
                                <span class="line"></span>类型
                            </th>
                            <th class="span3">
                                <span class="line"></span>价格
                            </th>
                            <th class="span3">
                                <span class="line"></span>状态
                            </th>
                            <th class="span3">
                                <span class="line"></span>创建时间
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($datas))
                            @foreach($datas as $data)
                        <tr class="first">
                            <td>
                                <input type="checkbox"/>
                            </td>
                            <td>
                                <div class="img">
                                    <img src="{{DOMAIN}}detail-admin/img/table-img.png"/>
                                </div>
                                <a href="#" class="name">Generate Lorem </a>
                            </td>
                            <td class="description">
                                if you are going to use a passage of Lorem Ipsum.
                            </td>
                            <td>
                                <span class="label label-success">Active</span>
                                <ul class="actions">
                                    <li><a href="#">Edit</a></li>
                                    <li class="last"><a href="#">Delete</a></li>
                                </ul>
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