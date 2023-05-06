<div>
    <x-session-messages.fail />
    <form method="POST" action="{{ $getFormActionUrl() }}">
        @csrf
        @if($isEditMode())
            @method('PUT')
        @endif
        <x-forms.inputs.text  
            class="mb-3"
            id="author_fullname_input"
            name="fullname"
            label="{{ __('views/components/backoffice/authors/forms/create_or_edit.labels.full_name') }}"
            :value="$getAuthorFullname()"
        />
        <button type="submit" class="btn btn-primary">{{ __('views/components/backoffice/authors/forms/create_or_edit.submit') }}</button>
    </form>
    <div class="mt-3 text-end">
        <a class="link" href="{{ $getIndexUrl() }}">{{ __('views/components/backoffice/authors/forms/create_or_edit.back_to_the_authors_list') }}</a>
    </div>
</div>