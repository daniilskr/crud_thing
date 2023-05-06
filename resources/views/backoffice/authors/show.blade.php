@extends('backoffice.layout.crud.show')

@section('backoffice.layout.crud.show')
    <h3>{{ $author->fullname }}</h1>

    @if($author->books->isEmpty())
        <p>{{ __('views/backoffice/authors/show.this_author_has_no_books') }}</p>
    @else
        <x-backoffice.books.tables.short-list :books="$author->books" />
    @endif

    <div class="mt-3 text-end">
        <x-link href="{{ route('backoffice.authors.index') }}">{{ __('views/backoffice/authors/show.back_to_the_authors_list') }}</x-link>
    </div>
@endsection