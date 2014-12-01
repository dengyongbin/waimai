<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="/admin/user/profile" id="show-shortcut">
                        <img src="{{{ asset('assets/img/avatars/sunny.png') }}}" alt="me" class="online"/>
						<span>
							{{{ Session::get('user')->email}}}
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive
    To make this navigation dynamic please make sure to link the node
    (the reference to the nav > ul) after page load. Or the navigation
    will not initialize.
    -->
    <nav>
        <ul>
            @foreach ($menus as $menu)
            @if ($menu->active)
            <li class="active">
                @elseif ($menu->open)
            <li class="active open">
                @else
            <li>
                @endif
                <a href="{{ URL::to($menu->url) }}" title="Dashboard">
                    <i class="fa fa-lg fa-fw {{ $menu->icon }}"></i>
                    <span class="menu-item-parent">{{ $menu->title }}</span>
                </a>
                @if ($menu->items)
                <ul>
                    @foreach ($menu->items as $item)
                    @if ($item->show)
                        @if ($item->active)
                        <li class="active">
                            @else
                        <li>
                        @endif
                            <a href="{{ URL::to($item->url) }}">{{ $item->title }}</a>
                        </li>
                    @endif
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </nav>
	<span class="minifyme" data-action="minifyMenu">
		<i class="fa fa-arrow-circle-left hit"></i>
	</span>
</aside>
<!-- END NAVIGATION -->