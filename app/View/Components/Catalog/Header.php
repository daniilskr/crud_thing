<?php

namespace App\View\Components\Catalog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function getLinks(): array
    {
        return [
            __('components/catalog/header.getlinks.go_to_backoffice') => 'backoffice.books.index',
        ];
    }

    public function isCurrentRoute(string $name): bool
    {
        return request()->routeIs(str_replace('index', '*', $name));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.catalog.header');
    }
}
