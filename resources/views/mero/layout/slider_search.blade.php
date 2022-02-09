@section('slider_search')
    <section id="search-2" class="widget widget_search">
        <form role="search" method="get" class="search-form"
              action="/search.html">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
            </label>
            <input type="submit" class="search-submit" value="Search">
        </form>
    </section>
@endsection