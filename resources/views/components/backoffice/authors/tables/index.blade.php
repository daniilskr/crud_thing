<div>
    <x-session-messages.destroyed />
    <x-session-messages.fail />
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">{{ __('views/components/backoffice/authors/tables/index.columns.full_name') }}</th>
            <th scope="col">{{ __('views/components/backoffice/authors/tables/index.columns.books') }}</th>
            <th scope="col">{{ __('views/components/backoffice/authors/tables/index.columns.actions') }}</th>
        </thead>
        <tbody>
            @forelse($authors as $author)
            <tr>
                <th scope="row">{{ $loop->iteration	}}</th>
                <td><x-link href="{{ $getShowUrl($author) }}">{{ $author->fullname }}</x-link></td>
                <td>{{ $author->books_count ?: '' }}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <x-buttons.crud.edit href="{{ $getEditUrl($author) }}" />
                    <x-buttons.crud.delete action="{{ $getDestroyUrl($author) }}" />
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" role="cell">
                    <div class="text-center my-2">{{ __('views/components/backoffice/authors/tables/index.there_are_no_authors') }}</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        <x-buttons.crud.new href="{{ $getCreateUrl() }}">{{ __('views/components/backoffice/authors/tables/index.new_author') }}</x-buttons.crud.new>
    </div>
</div>