{{--分页模板--}}


<div class="pagination" style="text-align:center;">
    <ul>
        <li><a href="{{ $prefix_url }}" style="font-size:14px;">首页</a></li>
        <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()==1?$datas->currentPage():$datas->currentPage()-1 }}">&#8249;</a></li>
        <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage() }}" class="active">{{ $datas->currentPage() }}</a></li>
    @if($datas->lastPage()>$datas->currentPage())
        @if(ceil($datas->total()/$datas->limit)>$datas->currentPage())
            <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()+1 }}">{{ $datas->currentPage()+1 }}</a></li>
        @endif
        @if(ceil($datas->total()/$datas->limit)>$datas->currentPage()+1)
            <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()+2 }}">{{ $datas->currentPage()+2 }}</a></li>
        @endif
        @if(ceil($datas->total()/$datas->limit)>$datas->currentPage()+3)
            <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()+3 }}">{{ $datas->currentPage()+3 }}</a></li>
        @endif
    @endif
        <li><a href="{{ $prefix_url }}/?page={{ ($datas->lastPage()<$datas->currentPage()&&$datas->currentPage()==1)?$datas->currentPage():$datas->currentPage()+1 }}">&#8250;</a></li>
        <li><a href="{{ $prefix_url }}/?page={{ $datas->lastPage() }}" style="font-size:14px;">尾页</a></li>
    </ul>
    <p>
        跳到第 <input type="text" name="page" style="width:15px;" value="{{ $datas->currentPage() }}"> 页
        <a onclick="window.location.href='{{ $prefix_url }}/?page='+$('input[name=page]').val();" class="btn btn-default" style="position:relative;top:-5px;">确定</a>
    </p>
    <p>每页{{ $datas->limit }}{{--{{ $datas->count() }}--}}条记录，共{{ $datas->lastPage() }}页，共{{ $datas->total() }}条记录，当前是第{{ $datas->currentPage() }}页</p>
</div>