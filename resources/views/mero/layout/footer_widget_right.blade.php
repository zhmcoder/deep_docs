@section('footer_widget_right')
    <section id="media_gallery-2" class="widget widget_media_gallery"><h2 class="widget-title">
            最新更新</h2>
        <div id="gallery-1" class="gallery gallery-columns-3" style="font-size: 0">
            @foreach($galleries as $gallery)

                <div class="gallery-item">

                    <img
                            src="{{ $gallery['thumb'] }}"
                            >

                </div>

            @endforeach
        </div>
    </section>
    <style>
        .gallery-item{
            height: 120px;
        }
        .gallery-item img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>


@show