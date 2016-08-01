{{--面包屑导航--}}


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ (isset($crumb)&&isset($curr_url)) ? $crumb[$curr_url] : '' }}
            <small>{{ isset($curr_url) ? strtoupper($curr_url) : '' }}</small>
        </h1>
        <ol class="breadcrumb">
            @if(isset($crumb)&&isset($curr_url))
                <li class="active"><i class="fa fa-dashboard"></i> {{ $crumb[$curr_url] }}
                    {{ isset($curr_detail) ? '/ '.$curr_detail : '' }}
                </li>
            @endif
        </ol>
        @if(isset($curr_detail))<p style="color:lightgrey;font-size:12px;">(<span class="star">*</span>)的为必填项</p>@endif
    </div>
</div>