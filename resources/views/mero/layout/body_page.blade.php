@section('body_page')
    @if(!empty($page))
        <nav class="navigation pagination" role="navigation" aria-label="Posts">
            <div class="nav-links">
                @if($page['show_pre'])
                    <a class="next page-numbers" href="{{ $page['pre_page_url'] }}">
                        <span class="screen-reader-text">上一页</span>
                        <svg class="icon icon-arrow-left" aria-hidden="true" role="img">
                            <use href="#icon-arrow-left" xlink:href="#icon-arrow-left"></use>
                        </svg>
                    </a>
                    <a class="page-numbers" href="{{ $page['pre_page_url'] }}">
                        <span class="meta-nav screen-reader-text">页数 </span>{{ $page['pre_page'] }}
                    </a>
                @endif
                <span aria-current="page" class="page-numbers current">
                    <span class="meta-nav screen-reader-text">页数 </span>{{ $page['current'] }}
                </span>
                @if($page['show_next'])
                    <a class="page-numbers" href="{{ $page['next_page_url'] }}">
                        <span class="meta-nav screen-reader-text">页数 </span>{{ $page['next_page'] }}
                    </a>
                    <a class="next page-numbers" href="{{ $page['next_page_url'] }}">
                        <span class="screen-reader-text">下一页</span>
                        <svg class="icon icon-arrow-right" aria-hidden="true" role="img">
                            <use href="#icon-arrow-right" xlink:href="#icon-arrow-right"></use>
                        </svg>
                    </a>
                @endif
            </div>
        </nav>
    @endif
@endsection