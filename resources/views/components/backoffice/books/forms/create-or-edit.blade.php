<div>
    <x-session-messages.fail />
    <form method="POST" action="{{ $getFormActionUrl() }}">
        @csrf
        @if($isEditMode())
            @method('PUT')
        @endif
        <x-forms.inputs.choices-select  
            class="mb-3"
            id="book_author_id_select"
            name="author_id"
            :models="$getAuthors()"
            :selectedValue="$selectedAuthorId"
            valueColumn="id"
            labelColumn="fullname"
            label="Full Name"
            placeholderLabel="Pick an author"
        />
        <x-forms.inputs.text  
            class="mb-3"
            id="book_title_input"
            name="title"
            label="Title"
            :value="$getBookTitle()"
        />
        <button type="submit" class="btn btn-primary">{{ __('views/components/backoffice/books/forms/create_or_edit.submit') }}</button>
    </form>
    <div class="mt-3 text-end">
        <a class="link" href="{{ $getIndexUrl() }}">{{ __('views/components/backoffice/books/forms/create_or_edit.back_to_the_authors_list') }}</a>
    </div>
</div>