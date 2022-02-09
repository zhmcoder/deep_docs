@section('body')
    <div id="content" class="site-content">
        <div id="content-wrap" class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    @section('body_grid')
                        @include('Mero::layout.body_grid')
                    @show

                    @section('body_page')
                        @include('Mero::layout.body_page')
                    @show
                </main><!-- #main -->
            </div><!-- #primary -->


            <aside id="secondary" class="widget-area">
                @section('slider')
                    @include('Mero::layout.slider')
                @show
            </aside><!-- #secondary -->

        </div><!-- .container -->

    </div><!-- #content -->
@endsection