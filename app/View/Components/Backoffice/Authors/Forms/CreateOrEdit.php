<?php

namespace App\View\Components\Backoffice\Authors\Forms;

use App\Models\Author;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateOrEdit extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?Author $author)
    {
        //
    }

    public function getAuthorFullname(): string
    {
        return (string) old('fullname', $this->author?->fullname);
    }

    public function isEditMode(): bool
    {
        return is_object($this->author);
    }

    public function getIndexUrl(): string
    {
        return route('backoffice.authors.index');
    }

    public function getFormActionUrl(): string
    {
        return is_object($this->author)
                ? route('backoffice.authors.update', ['author' => $this->author->id])
                : route('backoffice.authors.store');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backoffice.authors.forms.create-or-edit');
    }
}
