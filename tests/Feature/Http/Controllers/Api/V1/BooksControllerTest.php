<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use App\Models\Author;
use App\Models\Book;
use Database\Factories\BookFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class BooksControllerTest extends TestCase
{
    use WithFaker,
        RefreshDatabase;

    public function test_can_get_all_books(): void
    {
        $this->createBook();
        $this->assertSame(Book::count(), 1);

        $response = $this->get('/api/v1/books');

        $response
            ->assertStatus(200)
            ->assertJsonCount(Book::count(), 'data')    
        ;
    }

    public function test_can_get_a_book(): void
    {
        $book = $this->createBook();

        $response = $this->get("/api/v1/books/{$book->id}");

        $response
            ->assertStatus(200)
            ->assertJsonPath('data.id', $book->id)    
        ;
    }

    public function test_can_destroy_a_book(): void
    {
        $book = $this->createBook();

        $this->assertDatabaseHas(Book::class, ['id' => $book->id]);

        $response = $this->delete("/api/v1/books/{$book->id}");

        $response
            ->assertStatus(Response::HTTP_NO_CONTENT)    
        ;
        
        $this->assertDatabaseEmpty(Book::class);
    }

    public function test_can_store_a_book(): void
    {
        $book   = $this->makeBook();
        $author = $this->createAuthor();

        $data = [
            'title' => $book->title,
            'author_id' => $author->id,
        ];

        $this->post("/api/v1/books", $data);

        $this->assertDatabaseHas(Book::class, $data);
    }

    public function test_can_update_a_book(): void
    {
        $book      = $this->createBook();
        $newAuthor = $this->createAuthor();
        $newTitle  = $this->faker->text();

        $this->assertNotEquals($book->title, $newTitle);

        $newData = [
            'title' => $newTitle,
            'author_id' => $newAuthor->id,
        ];

        $this->put("/api/v1/books/{$book->id}", $newData);

        $this->assertDatabaseHas(Book::class, ['id' => $book->id, ...$newData]);
    }

    protected function createAuthor(): Author
    {
        return Author::factory()->create();
    }

    protected function makeBook(): Book
    {
        return Book::factory()->make();
    }

    protected function createBook(): Book
    {
        return Book::factory()->create();
    }
}
