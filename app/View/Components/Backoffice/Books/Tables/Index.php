<?php

namespace App\View\Components\Backoffice\Books\Tables;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Index extends Component
{
    public Collection $books;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->books = $this->queryBooks();
    }

    protected function queryBooks(): Collection
    {
        return Book::with('author')->get();
    }

    public function getEditUrl(Book $book): string
    {
        return route('backoffice.books.edit', ['book' => $book->id]);
    }

    public function getDestroyUrl(Book $book): string
    {
        return route('backoffice.books.destroy', ['book' => $book->id]);
    }

    public function getShowUrl(Book $book): string
    {
        return route('backoffice.books.show', ['book' => $book->id]);
    }

    public function getBookAuthorShowUrl(Book $book): string
    {
        return route('backoffice.authors.show', ['author' => $book->author->id]);
    }

    public function getCreateUrl(): string
    {
        return route('backoffice.books.create');
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backoffice.books.tables.index');
    }
}
