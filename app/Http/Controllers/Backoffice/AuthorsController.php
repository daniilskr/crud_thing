<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Http\Requests\Backoffice\Authors\StoreAuthorRequest;
use App\Http\Requests\Backoffice\Authors\UpdateAuthorRequest;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.authors.index', [
            'authors' => Author::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        if (($author = new Author($request->validated()))->save()) {
            return redirect()->route('backoffice.authors.show', ['author' => $author->id]);
        }

        return redirect()->back()->with([
            'message_fail' => __('controllers/authors.failed_to_save_the_author'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('backoffice.authors.show', [
            'author' => $author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('backoffice.authors.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        if ($author->update($request->validated())) {
            return redirect()->route('backoffice.authors.show', ['author' => $author->id]);
        }

        return redirect()->back()->with([
            'message_fail' => __('controllers/authors.failed_to_update_the_author'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if ($author->delete()) {
            return redirect()->back()->with([
                'message_destroyed' => __('controllers/authors.author_was_removed', ['fullname' => $author->fullname]),
            ]);
        }

        return redirect()->back()->with([
            'message_fail' => __('controllers/authors.failed_to_delete_the_author'),
        ]);
    }
}
