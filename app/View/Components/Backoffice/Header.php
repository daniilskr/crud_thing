<?php

namespace App\View\Components\Backoffice;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Route;
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
            __('components/backoffice/header.getlinks.books') => 'backoffice.books.index',
            __('components/backoffice/header.getlinks.authors') => 'backoffice.authors.index',
            __('components/backoffice/header.getlinks.go_to_frontoffice') => 'catalog', 
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
        return view('components.backoffice.header');
    }
}
