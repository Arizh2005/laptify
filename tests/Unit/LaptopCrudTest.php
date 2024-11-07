<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Laptop;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaptopCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_laptop()
    {
        $laptopData = [
            'merk' => 'Dell',
            'model' => 'XPS 13',
            'prosesor' => 'Intel i7',
            'ram' => 16,
            'storage' => 512,
        ];

        $response = $this->post('/crud-table', $laptopData);

        $response->assertStatus(302); // Redirect status
        $this->assertDatabaseHas('laptops', $laptopData);
    }

    /** @test */
    public function it_can_read_a_laptop()
    {
        $laptop = Laptop::factory()->create();

        $response = $this->get("/crud-table/{$laptop->id}");

        $response->assertStatus(200);
        $response->assertSee($laptop->merk);
        $response->assertSee($laptop->model);
    }

    /** @test */
    public function it_can_update_a_laptop()
    {
        $laptop = Laptop::factory()->create();

        $updateData = [
            'merk' => 'Updated Merk',
            'model' => 'Updated Model',
            'prosesor' => 'Updated Prosesor',
            'ram' => 32,
            'storage' => 1024,
        ];

        $response = $this->put("/crud-table/{$laptop->id}", $updateData);

        $response->assertStatus(302); // Redirect status
        $this->assertDatabaseHas('laptops', $updateData);
    }

    /** @test */
    public function it_can_delete_a_laptop()
    {
        $laptop = Laptop::factory()->create();

        $response = $this->delete("/crud-table/{$laptop->id}");

        $response->assertStatus(302); // Redirect status
        $this->assertDatabaseMissing('laptops', ['id' => $laptop->id]);
    }
}

