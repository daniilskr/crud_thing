@extends('backoffice.layout.crud.show')

@section('backoffice.layout.crud.show')
    <h1>{{ $book->title }}</h1>
    <h3>By <x-link href="{{ route('backoffice.authors.show', ['author' => $book->author->id]) }}">{{ $book->author->fullname }}</x-link></h1>
    <div class="mt-3 text-end">
        <x-link href="{{ route('backoffice.books.index') }}">Back to the books list</x-link>
    </div>
@endsection