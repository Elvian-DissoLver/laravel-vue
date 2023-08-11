<?php

namespace Tests\Unit;

use App\Models\Product;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
class ProductControllerTest extends TestCase
{
//    use RefreshDatabase;
//    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/product');

        $response->assertStatus(200)
            ->assertJsonCount(Product::count());
    }
    public function test_show()
    {
        $product = Product::factory()->create();

        $response = $this->get('/api/product/' . $product->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
            ]);
    }

    public function test_store()
    {
        $data = [
            'name' => 'New Product',
            'price' => 99.99,
        ];

        $response = $this->post('/api/product', $data);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'New Product',
                'price' => (float) 99.99,
            ]);

        $this->assertDatabaseHas('products', $data);
//        $this->assertDatabaseMissing('products', $data);
    }

    public function test_update()
    {
        $product = Product::factory()->create();

        $data = [
            'name' => 'Updated Product',
            'price' => 88.88,
        ];

        $response = $this->put('/api/product/' . $product->id, $data);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => 'Updated Product',
                'price' => 88.88,
            ]);

        $this->assertDatabaseHas('products', $data);
//        $this->assertDatabaseMissing('products', $data);
    }

    public function test_destroy()
    {
        $product = Product::factory()->create();

        $response = $this->delete('/api/product/' . $product->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

}
