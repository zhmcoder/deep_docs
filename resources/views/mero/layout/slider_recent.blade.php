@section('slider_recent')
    <section id="recent-posts-2" class="widget widget_recent_entries">
        <h2 class="widget-title">最近更新</h2>
        <ul>
            @foreach($recent_articles as $article)<li>
                <a href="/art/{{ $article['id'] }}.html">
                    {{ $article['title'] }}</a>
            </li>
            @endforeach
        </ul>
    </section>
@endsection