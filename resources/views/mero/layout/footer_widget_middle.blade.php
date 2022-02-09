@section('footer_widget_middle')
    <section id="categories-2" class="widget widget_categories"><h2 class="widget-title">Categories</h2>
        <ul>
            @if(count($menus)>6)
                @for($i=0; $i<6; $i++)
                    <li class="cat-item cat-item-2"><a
                                href="/cat/{{ $menus[$id]['id'] }}.html">{{ $menus[$i]['title'] }}</a>
                    </li>
                @endfor
            @else
                @foreach($menus as $menu)
                    <li class="cat-item cat-item-2"><a
                                href="/cat/{{ $menu['id'] }}.html">{{ $menu['title'] }}</a>
                    </li>
                @endforeach
            @endif
        </ul>

    </section>
@show