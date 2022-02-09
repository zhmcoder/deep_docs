@extends('Mero::default')

@section('body_grid')
    <section class="error-404 not-found">
        <header class="page-header">
            <h3 class="title">404</h3>
            <h1 class="page-title">Oops! That page can’t be found.</h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
            <form role="search" method="get" class="search-form" action="/search.html">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>				</div><!-- .page-content -->
    </section><!-- .error-404 -->
@endsection