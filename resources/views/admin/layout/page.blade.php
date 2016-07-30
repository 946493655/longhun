{{--分页模板--}}


<style>
    .page ul { float:right; }
    .page li { list-style:none; }
    .page li,.page p { float:left; }
    .page a { margin:0 2px;padding:2px 10px;color:white;border:1px solid rgb(50,50,50);background:rgb(50,50,50); }
    .page a:hover { color:black;border:1px solid lightgrey;background:lightgrey; }
</style>

<div class="page">
    <ul>
        <li><a href="{{ $prefix_url }}">
                首页</a></li>
    @if ($datas->lastPage() > 1 && $datas->currentPage() != 1)
        <li>
            <a href="{{ $prefix_url }}?page={{ $datas->currentPage()-1 }}">«上一页</a></li>
    @elseif ($datas->currentPage() == 1)
        <li><a href="{{ $prefix_url }}">«上一页</a></li>
    @endif
    @if ($datas->lastPage() > 1 && $datas->currentPage() != $datas->lastPage())
        <li><a href="{{ $prefix_url }}?page={{ $datas->currentPage()+1 }}">下一页»</a></li>
        <li><a href="{{ $prefix_url }}?page={{ $datas->lastPage() }}">尾页</a></li>
    @elseif ($datas->currentPage() == $datas->lastPage())
        <li><a href="{{ $prefix_url }}?page={{ $datas->lastPage() }}">下一页»</a></li>
        <li><a href="{{ $prefix_url }}?page={{ $datas->lastPage() }}">尾页</a></li>
    @endif
    </ul>
    <p>
        每页 {{ $datas->limit }}{{--{{ $datas->count() }}--}} 条记录，共 {{ $datas->lastPage() }} 页，共 {{ $datas->total() }} 条记录，当前是第 {{ $datas->currentPage() }} 页
    </p>
</div>