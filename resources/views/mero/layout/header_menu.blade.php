@section('header_menu')
    <nav id="site-navigation" class="main-navigation navigation-menu">
        <div class="menu-primary-container">
            <ul id="primary-menu" class="nav-menu">
                @foreach($menus as $menu)
                    <li id="menu-item-{{ $menu['id'] }}"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-{{ $menu['id'] }}">
                        <a href="/cat/{{ $menu['id'] }}.html">{{ $menu['title'] }}
                            @if(count($menu['sub_menu'])>0)
                            <svg class="icon icon-angle-down" aria-hidden="true" role="img">
                                <use href="#icon-angle-down" xlink:href="#icon-angle-down"></use>
                            </svg>
                            @endif
                        </a>
                        @if(count($menu['sub_menu'])>0)
                        <button class="dropdown-toggle" aria-expanded="false">
                            <svg class="icon icon-angle-down" aria-hidden="true" role="img">
                                <use href="#icon-angle-down" xlink:href="#icon-angle-down"></use>
                            </svg>
                            <span class="svg-fallback icon-angle-down"></span><span class="screen-reader-text">Expand child menu</span>
                        </button>
                        <ul class="sub-menu">
                            @foreach($menu['sub_menu'] as $sub_menu)
                            <li id="menu-item-{{ $sub_menu['id'] }}"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{{ $sub_menu['id'] }}"><a
                                        href="/cat/{{ $sub_menu['id'] }}.html">{{ $sub_menu['title'] }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav><!-- #site-navigation -->
@show