<div>
    <ul>
        @foreach($books as $book)
            <li>
                <x-link
                  href="{{ route('backoffice.books.show', ['book' => $book->id]) }}"
                >{{ $book->title }}</x-link>
            </li>
        @endforeach
    </ul>
</div>