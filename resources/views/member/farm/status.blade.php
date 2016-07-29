@extends('member.main')
@section('content')
    <link rel="stylesheet" href="{{PUB}}detail-admin/css/compiled/form-wizard.css" type="text/css"/>

    <div class="container-fluid">
        <div id="pad-wrapper">
            <div class="row-fluid">
                <div class="span12">
                    <h3 style="font-family:'黑体';">自定义单子流程</h3><br>
                    <div id="fuelux-wizard" class="wizard row-fluid">
                        <ul class="wizard-steps">
                            <li data-target="#step1" class="active">
                                <span class="step">1</span>
                                <span class="title">{{ $model['statuss'][1] }}</span>
                            </li>
                            <li data-target="#step2" class="{{ $data->status>1 ? 'active' : '' }}">
                                <span class="step">2</span>
                                <span class="title">{{ $model['statuss'][2] }}</span>
                            </li>
                            <li data-target="#step3" class="{{ $data->status>2 ? 'active' : '' }}">
                                <span class="step">3</span>
                                <span class="title">{{ $model['statuss'][3] }}</span>
                            </li>
                            <li data-target="#step4" class="{{ $data->status>3 ? 'active' : '' }}">
                                <span class="step">4</span>
                                <span class="title">{{ $model['statuss'][4] }}</span>
                            </li>
                        </ul>
                    </div>
                    @if(count($model['statuss'])>4 && count($model['statuss'])<=8)
                    <br>
                    <div style="margin:0 13% 0 5%;border-bottom:1px dashed rgba(200,200,200,1);"></div>
                    <div id="fuelux-wizard" class="wizard row-fluid">
                        <ul class="wizard-steps">
                            <li data-target="#step1" class="{{ $data->status>4 ? 'active' : '' }}">
                                <span class="step">5</span>
                                <span class="title">{{ $model['statuss'][5] }}</span>
                            </li>
                            <li data-target="#step2" class="{{ $data->status>5 ? 'active' : '' }}">
                                <span class="step">6</span>
                                <span class="title">{{ $model['statuss'][6] }}</span>
                            </li>
                            <li data-target="#step3" class="{{ $data->status>6 ? 'active' : '' }}">
                                <span class="step">7</span>
                                <span class="title">{{ $model['statuss'][7] }}</span>
                            </li>
                            <li data-target="#step4" class="{{ $data->status>7 ? 'active' : '' }}">
                                <span class="step">8</span>
                                <span class="title">{{ $model['statuss'][8] }}</span>
                            </li>
                        </ul>
                    </div>
                    @endif

                    <div style="height:40px;border-bottom:1px solid rgba(240,240,240,1);"></div>
                    <div class="step-content">
                        <div class="step-pane active" id="step1">
                            <div class="row-fluid form-wrapper">
                                <div class="span8">
                                    <div class="field-box">
                                        <label>单子状态:</label>
                                        <input class="span8" type="text" value="{{ $data->statusName() }}" disabled/>
                                    </div>
                                    <div class="field-box">
                                        <label>主持:</label> {{ $data->user()->username }}
                                    </div>
                                    <div class="field-box">
                                        <label>流程下一步:</label>
                                        <button class="btn btn-default" onclick="window.location.href='{{DOMAIN}}member/farm/status/'+{{ $data->id }}+'/'+{{ $data->status+1 }};" title="点击进入下一步">{{ $model['statuss'][$data->status+1] }}</button> (做单流程记录)
                                    </div>

                                    <div class="field-box">
                                        <label>重置状态:</label>
                                        <div class="ui-select">
                                            <select name="status">
                                                @foreach($model['statuss'] as $kstatus=>$vstatus)
                                                <option value="{{ $kstatus }}" {{ $kstatus==$data->status ? 'selected' : '' }}/>{{ $vstatus }}
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-default" onclick="window.location.href='{{DOMAIN}}member/farm/status/'+{{ $data->id }}+'/'+$('select[name=status]').val();">确定</button>
                                    </div>

                                    <div class="field-box" style="text-align:center;">
                                        <button class="btn btn-default" onclick="window.location.href='{{DOMAIN}}member/farm';">返回列表</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop