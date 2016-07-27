{{--分页模板--}}


<div class="pagination" style="text-align:center;">
    <ul>
        <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()==1?$datas->currentPage():$datas->currentPage()-1 }}">&#8249;</a></li>
        <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage() }}" class="active">{{ $datas->currentPage() }}</a></li>
        @if(ceil($datas->total()/$data->count())>1)
            <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()+1 }}">
                    {{ $datas->currentPage()+1 }}</a></li>
        @endif
        @if(ceil($datas->total()/$data->count())>2)
            <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()+2 }}">{{ $datas->currentPage()+2 }}</a></li>
        @endif
        @if(ceil($datas->total()/$data->count())>3)
            <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()+3 }}">{{ $datas->currentPage()+3 }}</a></li>
        @endif
        <li><a href="{{ $prefix_url }}/?page={{ $datas->currentPage()==1?$datas->currentPage():$datas->currentPage()+1 }}">&#8250;</a></li>
    </ul>
    <p>每页{{ $datas->limit }}{{--{{ $datas->count() }}--}}条记录，共{{ $datas->lastPage() }}页，共{{ $datas->total() }}条记录，当前是第{{ $datas->currentPage() }}页</p>
</div>