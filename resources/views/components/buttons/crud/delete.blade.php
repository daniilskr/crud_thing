<form class="d-inline-block" {{ $attributes->only('action') }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-light"><x-icons.bootstrap.trash-fill class="mb-1" fill="#ff2f2f" /><p class="ms-1 d-md-inline d-none">Delete</p></button>
</form>