{{--4个数字--}}


{{--<link rel="stylesheet" href="{{PUB}}detail-admin/css/compiled/index.css" type="text/css" media="screen" />--}}
<style>
    #main-stats {
        margin-left: -20px;
        margin-right: -20px;
        background-color: #fdfdfd;
        border-bottom: 1px solid #efeef3; }
    #main-stats .stats-row {
        box-shadow: inset -1px 0px 5px 2px #f9f9f9; }
    #main-stats .stat {
        text-align: right;
        padding: 30px 0px 35px 0px;
        border-right: 1px solid #e8e9ee;
        position: relative;
        box-shadow: 1px 0px 0px 0px white; }
    #main-stats .stat.last {
        border-right: 0px; }
    #main-stats .stat .data {
        color: #29323a;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 16px;
        padding-right: 50px; }
    #main-stats .stat .data .number {
        color: #32a0ee;
        font-size: 25px;
        margin-right: 15px; }
    #main-stats .stat .date {
        color: #b4b8bb;
        font-weight: lighter;
        font-family: 'Lato', 'Open Sans';
        font-style: italic;
        font-size: 13px;
        position: absolute;
        right: 50px; }
</style>
<div id="main-stats">
    <div class="row-fluid stats-row">
        {{--<div class="span3 stat">--}}
        {{--<div class="data">--}}
        {{--<span class="number">2457</span>--}}
        {{--信息--}}
        {{--</div>--}}
        {{--<span class="date">Today</span>--}}
        {{--</div>--}}
        <div class="span3 stat">
            <div class="data">
                <span class="number">{{ $farms->allFarms }}</span> 单子
            </div>
            <span class="date">ORDER</span>
        </div>
        {{--<div class="span3 stat">--}}
            {{--<div class="data">--}}
                {{--<span class="number">0</span> 任务--}}
            {{--</div>--}}
            {{--<span class="date">TASK</span>--}}
        {{--</div>--}}
        {{--<div class="span3 stat last">--}}
            {{--<div class="data">--}}
                {{--<span class="number">0</span>--}}
                {{--卡卷--}}
            {{--</div>--}}
            {{--<span class="date">CARD VOLUMN</span>--}}
        {{--</div>--}}
    </div>
</div>