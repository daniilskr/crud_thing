<div>
    <x-session-messages.destroyed />
    <x-session-messages.fail />
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">{{ __('views/components/backoffice/books/tables/index.columns.title') }}</th>
            <th scope="col">{{ __('views/components/backoffice/books/tables/index.columns.author') }}</th>
            <th scope="col">{{ __('views/components/backoffice/books/tables/index.columns.actions') }}</th>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <th scope="row">{{ $loop->iteration	}}</th>
                <td><x-link href="{{ $getShowUrl($book) }}">{{ $book->title }}</x-link></td>
                <td><x-link href="{{ $getBookAuthorShowUrl($book) }}">{{ $book->author->fullname }}</x-link></td>
                <td class="text-nowrap" style="width: 1px;">
                    <x-buttons.crud.edit href="{{ $getEditUrl($book) }}" />
                    <x-buttons.crud.delete action="{{ $getDestroyUrl($book) }}" />
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" role="cell">
                    <div class="text-center my-2">{{ __('views/components/backoffice/books/tables/index.there_are_no_books') }}</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        <x-buttons.crud.new href="{{ $getCreateUrl() }}">{{ __('views/components/backoffice/books/tables/index.new_book') }}</x-buttons.crud.new>
    </div>
</div>