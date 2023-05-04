<div>
    <x-session-messages.destroyed />
    <x-session-messages.fail />
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{ $loop->iteration	}}</th>
                <td><x-link href="{{ $getShowUrl($book) }}">{{ $book->title }}</x-link></td>
                <td><x-link href="{{ $getBookAuthorShowUrl($book) }}">{{ $book->author->fullname }}</x-link></td>
                <td class="text-nowrap" style="width: 1px;">
                    <x-buttons.crud.edit href="{{ $getEditUrl($book) }}" />
                    <x-buttons.crud.delete action="{{ $getDestroyUrl($book) }}" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <x-buttons.crud.new href="{{ $getCreateUrl() }}">New Book</x-buttons.crud.new>
    </div>
</div>