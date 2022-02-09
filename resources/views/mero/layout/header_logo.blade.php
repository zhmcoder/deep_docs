@section('header_nav')
    <div class="site-branding">
        <div class="site-branding-logo">
        </div><!-- .site-branding-logo -->

        <div class="site-branding-text">
            <h1 class="site-title">
                <a href="/" rel="home">
                    {{ config('deep_blog.blog_name') }}
                </a>
            </h1>
            <p class="site-description">{{ config('deep_blog.blog_sub_title') }}</p>
        </div><!-- .site-branding-text -->
    </div><!-- .site-branding -->
@show