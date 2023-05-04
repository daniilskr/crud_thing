<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\Backoffice\Books\StoreBookRequest;
use App\Http\Requests\Backoffice\Books\UpdateBookRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.books.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        if (($book = new Book($request->validated()))->save()) {
            return redirect()->route('backoffice.books.show', ['book' => $book->id]);
        }

        return redirect()->back()->with([
            'message_fail' => 'Failed to save the book.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('backoffice.books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('backoffice.books.edit', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        if ($book->update($request->validated())) {
            return redirect()->route('backoffice.books.show', ['book' => $book->id]);
        }

        return redirect()->back()->with([
            'message_fail' => 'Failed to update the book.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->delete()) {
            return redirect()->back()->with([
                'message_destroyed' => "$book->title was removed.",
            ]);
        }

        return redirect()->back()->with([
            'message_fail' => 'Failed to delete the book.',
        ]);
    }
}
