<a class="d-inline-block text-decoration-none" {{ $attributes->only('href') }} method="GET">
    <button type="submit" class="btn btn-success"><x-icons.bootstrap.plus-lg fill="white" class="me-2 mb-1" />{{ $slot }}</button>
</form>
