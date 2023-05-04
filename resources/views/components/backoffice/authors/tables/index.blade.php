<div>
    <x-session-messages.destroyed />
    <x-session-messages.fail />
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Books</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr>
                <th scope="row">{{ $loop->iteration	}}</th>
                <td><x-link href="{{ $getShowUrl($author) }}">{{ $author->fullname }}</x-link></td>
                <td>{{ $author->books_count ?: '' }}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <x-buttons.crud.edit href="{{ $getEditUrl($author) }}" />
                    <x-buttons.crud.delete action="{{ $getDestroyUrl($author) }}" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <x-buttons.crud.new href="{{ $getCreateUrl() }}">New Author</x-buttons.crud.new>
    </div>
</div>