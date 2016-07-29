@extends('member.main')
@section('content')
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <h3 style="font-family:'黑体';">自定义单子创建</h3><br>
                <div class="span8 column" style="width:100%;">
                <form action="{{DOMAIN}}member/farm" method="POST" enctype="multipart/form-data"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="field-box">
                        <label>单子类型：</label>
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
                        <label>等级：</label>
                        <div class="ui-select">
                            <select name="level" required>
                                @foreach($model['levels'] as $klevel=>$vlevel)
                                <option value="{{ $klevel }}"/>{{ $vlevel }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>价格:(元)</label>
                        <input class="span8" type="text" placeholder="做单子的佣金，例：5.10" pattern="^(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)$" required name="money"/>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>内容要求:</label>
                        <textarea class="span8" rows="4" placeholder="输入单子的要求，最多250字字符" required maxlength="250" name="intro"></textarea>
                        <p>还可以输入 <span id="number">250</span> 字符</p>
                    </div>

                    <div class="field-box">
                        <label>对应的主持：<a href="{{DOMAIN}}member/farmSupply/create">添加主持</a></label>
                        <div class="ui-select">
                            <select name="supply_id" required>
                                @foreach($supplys as $supply)
                                    <option value="{{ $supply->id }}"/>{{ $supply->getName() }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="field-box">
                        <label>使用账号：<a href="{{DOMAIN}}member/farmDemand/create">添加账号</a></label>
                        <div class="ui-select" style="width:400px;">
                            <select name="demand_id" required>
                                @foreach($demands as $demand)
                                    <option value="{{ $demand->id }}"/>{{ $demand->getName() }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-default">保存添加</button>
                </form>
                </div>
                @include('member.farm.info')
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("textarea[name='intro']").change(function(){
                $("#number").html(250-$(this).val().length*1);
            });
        });
    </script>
@stop