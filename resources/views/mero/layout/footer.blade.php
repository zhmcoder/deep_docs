@section('footer')
    <footer id="colophon" class="site-footer">

        <div id="footer-widgets" class="container" style="padding-top: 60px; padding-bottom: 60px;">
            <aside class="widget-area" role="complementary" aria-label="Footer">
                <div class="widget-column footer-widget-1">
                    @section('footer_widget_left')
                        @include('Mero::layout.footer_widget_left')
                    @show
                </div>

                <div class="widget-column footer-widget-2">
                    @section('footer_widget_middle')
                        @include('Mero::layout.footer_widget_middle')
                    @show
                </div>
                <div class="widget-column footer-widget-3">
                    @section('footer_widget_right')
                        @include('Mero::layout.footer_widget_right')
                    @show

                </div>
            </aside><!-- .widget-area -->
        </div><!-- .container -->
        @section('footer_copyright')
            @include('Mero::layout.footer_copyright')
        @show
    </footer><!-- #colophon -->
@section('footer_to_top')
    @include('Mero::layout.footer_to_top')
@show
@endsection