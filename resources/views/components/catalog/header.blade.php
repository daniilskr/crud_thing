<header class="navbar navbar-expand-lg header-navbar catalog-navbar sticky-top">
    <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap">
        <a class="navbar-brand" href="#">{{ __('views/components/catalog/header.catalog') }}</a>
        <div class="d-flex gap-3">
            @foreach($getLinks() as $link_name => $link_route_name)
                @if($isCurrentRoute($link_route_name))
                    <a class="nav-link active" href="{{ route($link_route_name) }}"><span class="sr-only">{{ $link_name }}</span></a>
                @else
                    <a class="nav-link" href="{{ route($link_route_name) }}">{{ $link_name }}</a>
                @endif
            @endforeach
        </div>
    </nav>
</header>