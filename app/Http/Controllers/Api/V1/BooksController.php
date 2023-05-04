<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\Api\V1\Books\StoreBookRequest;
use App\Http\Requests\Api\V1\Books\UpdateBookRequest;
use App\Http\Resources\Api\V1\Books\BookResource;
use Symfony\Component\HttpFoundation\Response;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookResource::collection(Book::with('author')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        if (($book = new Book($request->validated()))->save()) {
            return new BookResource($book);
        }

        abort(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        if ($book->update($request->validated())) {
            return new BookResource($book->refresh());
        }

        abort(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response(status: Response::HTTP_NO_CONTENT);
    }
}
