<div>
    @forelse($authors as $author)
    <div class="mb-3">
        <h1>{{ $author->fullname }}</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($author->books as $book)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ fake()->text() }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>{{ __('views/components/catalog/catalog_list.author_has_no_books') }}</p>
            @endforelse
        </div>
    </div>
    @empty
    <div class="mb-3 text-center">
        <h5>{{ __('views/components/catalog/catalog_list.we_have_nothing_in_our_catalog') }}</h5>
    </div>
    @endforelse
</div>