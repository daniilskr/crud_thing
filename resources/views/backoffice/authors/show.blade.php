@extends('backoffice.layout.crud.show')

@section('backoffice.layout.crud.show')
    <h3>{{ $author->fullname }}</h1>

    @if($author->books->isEmpty())
        <p>This author has no books.</p>
    @else
        <x-backoffice.books.tables.short-list :books="$author->books" />
    @endif

    <div class="mt-3 text-end">
        <x-link href="{{ route('backoffice.authors.index') }}">Back to the authors list</x-link>
    </div>
@endsection