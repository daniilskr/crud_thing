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
            label="Full Name"
            :value="$getAuthorFullname()"
        />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="mt-3 text-end">
        <a class="link" href="{{ $getIndexUrl() }}">Back to the authors list</a>
    </div>
</div>