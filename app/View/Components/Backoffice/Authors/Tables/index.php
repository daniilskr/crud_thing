<?php

namespace App\View\Components\Backoffice\Authors\Tables;

use App\Models\Author;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class index extends Component
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
        return Author::withCount('books')->get();
    }

    public function getEditUrl(Author $author): string
    {
        return route('backoffice.authors.edit', ['author' => $author->id]);
    }

    public function getDestroyUrl(Author $author): string
    {
        return route('backoffice.authors.destroy', ['author' => $author->id]);
    }

    public function getShowUrl(Author $author): string
    {
        return route('backoffice.authors.show', ['author' => $author->id]);
    }

    public function getCreateUrl(): string
    {
        return route('backoffice.authors.create');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backoffice.authors.tables.index');
    }
}
