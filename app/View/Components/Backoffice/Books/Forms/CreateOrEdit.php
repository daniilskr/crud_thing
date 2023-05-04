<?php

namespace App\View\Components\Backoffice\Books\Forms;

use App\Models\Author;
use App\Models\Book;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateOrEdit extends Component
{
    public ?int $selectedAuthorId;
    public bool $isNotAuthorSelected;

    /**
     * Create a new component instance.
     */
    public function __construct(public ?Book $book) {
        $this->selectedAuthorId    = (int) old('author_id', $this?->book?->author?->id) ?: null;
        $this->isNotAuthorSelected = is_null($this->selectedAuthorId);
    }

    public function getFormActionUrl(): string
    {
        return is_object($this->book)
                ? route('backoffice.books.update', ['book' => $this->book->id])
                : route('backoffice.books.store');
    }

    public function getIndexUrl(): string
    {
        return route('backoffice.books.index');
    }

    public function getBookTitle(): string
    {
        return (string) old('title', $this->book?->title);
    }

    public function isEditMode(): bool
    {
        return is_object($this->book);
    }

    public function getAuthors()
    {
        return Author::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backoffice.books.forms.create-or-edit');
    }
}
