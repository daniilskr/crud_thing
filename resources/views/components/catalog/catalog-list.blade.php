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
                <p>Author has no books...</p>
            @endforelse
        </div>
    </div>
    @empty
    <div class="mb-3 text-center">
        <h5>Sadly we have nothing in our catalog...</h5>
    </div>
    @endforelse
</div>