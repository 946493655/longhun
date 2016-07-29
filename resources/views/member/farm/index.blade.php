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
                        类型
                        <div class="ui-select" style="width:50px;">
                            <select name="genre">
                                <option value="0" {{ $genre==0 ? 'selected' : '' }}>所有</option>
                                @foreach($model['genres'] as $kgenre=>$vgenre)
                                <option value="{{ $kgenre }}" {{ $genre==$kgenre ? 'selected' : '' }}>{{ $vgenre }}</option>
                                @endforeach
                            </select>
                        </div>
                        &nbsp;
                        状态
                        <div class="ui-select" style="width:50px;">
                            <select name="status">
                                <option value="0" {{ $status==0 ? 'selected' : '' }}>所有</option>
                                @foreach($model['statuss'] as $kstatus=>$vstatus)
                                <option value="{{ $kstatus }}" {{ $status==$kstatus ? 'selected' : '' }}>{{ $vstatus }}</option>
                                @endforeach
                            </select>
                        </div>
                        &nbsp;
                        {{--<input type="text" class="search"/>--}}
                        <a class="btn-flat success new-product" href="{{DOMAIN}}member/farm/create">+ 添加单子</a>
                    </div>
                    <script>
                        $(document).ready(function(){
                            var genre = $("select[name='genre']");
                            var status = $("select[name='status']");
                            genre.change(function(){
                                if (genre.val()==0 && status.val()==0) {
                                    window.location.href = '{{DOMAIN}}member/farm';
                                } else {
                                    window.location.href = '{{DOMAIN}}member/farm/index/'+genre.val()+'/'+status.val();
                                }
                            });
                            status.change(function(){
                                if (genre.val()==0 && status.val()==0) {
                                    window.location.href = '{{DOMAIN}}member/farm';
                                } else {
                                    window.location.href = '{{DOMAIN}}member/farm/index/'+genre.val()+'/'+status.val();
                                }
                            });
                        });
                    </script>
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
                                <a href="{{DOMAIN}}member/farm/{{ $data->id }}" class="name">{{ $data->genreName() }}</a>
                            </td>
                            <td class="description">{{ $data->money() }}</td>
                            <td class="description">{{ str_limit($data->intro,20) }}</td>
                            <td class="description">{{ $data->statusName() }}</td>
                            <td class="description">{{ $data->createTime() }}</td>
                            <td>
                                <a href="{{DOMAIN}}member/farm/{{ $data->id }}" class="btn btn-default">查看</a>
                                <a href="{{DOMAIN}}member/farm/status/{{ $data->id }}" class="btn btn-default">走流程</a>
                                @if($data->status<2)
                                <a href="{{DOMAIN}}member/farm/{{ $data->id }}/edit" class="btn btn-default">修改</a>
                                <a href="{{DOMAIN}}member/farm/{{ $data->id }}/destroy" class="btn btn-default">删除</a>
                                @endif
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @include('member.layout.page')
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td>本页总价：{{ $datas->totalMoney }}</td>
                            <td>本页总单数：{{ count($datas).'单' }}</td>
                            <td>淘宝单轮数(300单/轮)：{{ $datas->taobaoTurn }}</td>
                            <td>本轮淘宝单数/佣金：{{ $datas->tbTurn }} / {{ $datas->tbTurnMoney }}</td>
                            <td><a href="">计算</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p>注意：只有未下单的状态，可以修改、删除</p>
            </div>
        </div>
    </div>
@stop