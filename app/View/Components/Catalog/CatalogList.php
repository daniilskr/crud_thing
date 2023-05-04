<?php

namespace App\View\Components\Catalog;

use App\Models\Author;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CatalogList extends Component
{
    public Collection $authors;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->authors = $this->queryAuthors();
    }

    protected function queryAuthors(): Collection
    {
        return Author::with('books')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.catalog.catalog-list');
    }
}
