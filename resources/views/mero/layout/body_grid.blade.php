@section('body_grid')

        @if(!empty($articles))
            <div class="blog-archive grid col-{{ config('deep_blog.home_column_num') }} clear"
                 style="position: relative; height: 1368.31px;">
            @foreach($articles as $article)
                <article id="post-{{ $article['id'] }}"
                         class="grid-item post-{{ $article['id'] }} post type-post status-publish format-standard has-post-thumbnail hentry category-fashion"
                         style="position: absolute; left: 0px; top: 0px;">
                    <div class="blog-post-item">
                        @if($article['thumb'])
                            <div class="featured-image">
                                <a class="post-thumbnail"
                                   href="/art/{{ $article['id'] }}.html"
                                   aria-hidden="true" tabindex="-1">
                                    <img width="1159" height="768" src="{{ $article['thumb'] }}"
                                         class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                         alt="{{ $article['title'] }}" loading="lazy"
                                         srcset="{{ $article['thumb'] }} 1159w, {{ $article['thumb'] }} 300w, {{ $article['thumb'] }} 1024w, {{ $article['thumb'] }} 768w"
                                         sizes="(max-width: 1159px) 100vw, 1159px"> </a>

                            </div><!-- .featured-image -->
                        @endif

                        <div class="entry-container">
                            <div class="category-meta">
                                        <span class="cat-links"><a
                                                    href="/cat/{{ $article['category']['id'] }}.html"
                                                    rel="category tag">{{ $article['category']['title'] }}</a></span>
                            </div><!-- .category-meta -->

                            <header class="entry-header">
                                <h2 class="entry-title"><a
                                            href="/art/{{ $article['id'] }}.html"
                                            rel="bookmark">{{ $article['title'] }}</a></h2></header>
                            <!-- .entry-header -->

                            <div class="entry-meta">
                                        <span class="byline"> by: <span class="author vcard"><a class="url fn n"
                                                                                                 >{{ $article['author']['name'] }}</a></span></span><span
                                        class="posted-on">Posted on: <a
                                            rel="bookmark"><time class="entry-date published updated"
                                        >{{ $article['updated_time'] }}</time></a></span>
                            </div><!-- .entry-meta -->

                            <div class="entry-content">
                                <p>{{ $article['summary'] }} […]</p>
                            </div><!-- .entry-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .blog-post-item -->
                </article><!-- #post-106 -->
            @endforeach
    </div><!-- .blog-archive -->
        @else
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title">Oops! That category is empty.</h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
                    <form role="search" method="get" class="search-form" action="/search">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>				</div><!-- .page-content -->
            </section><!-- .error-404 -->
        @endif
@endsection