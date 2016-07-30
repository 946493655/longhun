{{--圆环--}}


<div class="row-fluid section">
    <h4 class="title">示意图</h4><br>
    <div class="row-fluid">
        <div class="span3">
            <input type="text" value="{{ count($farms) ? ceil($farms->successFarms/count($farms)) : 0 }}" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#30a1ec" data-bgcolor="#d4ecfd" data-width="140" />
            <h4 class="title" style="font-family:'黑体';">淘宝单 Order</h4>
        </div>
        {{--<div class="span3">--}}
            {{--<input type="text" value="75" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#8ac368" data-bgcolor="#c4e9aa" data-width="140" />--}}
            {{--<h4 class="title">任务 Order</h4>--}}
        {{--</div>--}}
        {{--<div class="span3">--}}
            {{--<input type="text" value="35" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#5ba0a3" data-bgcolor="#cef3f5" data-width="140" />--}}
            {{--<h4 class="title">卡卷 Card volume</h4>--}}
        {{--</div>--}}
        {{--<div class="span3">--}}
        {{--<input type="text" value="85" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#b85e80" data-bgcolor="#f8d2e0" data-width="140" />--}}
        {{--<h4 class="title">jQuery Knob</h4>--}}
        {{--</div>--}}
    </div>
</div>