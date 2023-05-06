@extends('backoffice.layout.crud.show')

@section('backoffice.layout.crud.show')
    <h1>{{ $book->title }}</h1>
    <h3>{{ __('views/backoffice/books/show.by') }} <x-link href="{{ route('backoffice.authors.show', ['author' => $book->author->id]) }}">{{ $book->author->fullname }}</x-link></h1>
    <div class="mt-3 text-end">
        <x-link href="{{ route('backoffice.books.index') }}">{{ __('views/backoffice/books/show.back_to_the_books_list') }}</x-link>
    </div>
@endsection