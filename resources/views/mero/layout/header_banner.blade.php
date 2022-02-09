@section('header_banner')
    @if(!empty($banner))
    <div class="custom-header-media">
        <div id="wp-custom-header" class="wp-custom-header">
            <video id="wp-custom-header-video" autoplay="" loop="" playsinline="" width="1900" height="935"
                   src="https://kantipurthemes.com/demo/mero-blog-pro/wp-content/uploads/sites/7/2020/08/header-video.mp4"></video>
            <button type="button" id="wp-custom-header-video-button"
                    class="wp-custom-header-video-button wp-custom-header-video-play">Pause
            </button>
        </div>
    </div><!-- .custom-header-media -->
    @endif
@show