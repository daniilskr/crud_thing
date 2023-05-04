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
            'Books' => 'backoffice.books.index',
            'Authors' => 'backoffice.authors.index',
            'Go to Frontoffice' => 'catalog', 
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
