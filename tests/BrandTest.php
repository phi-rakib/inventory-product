<?php

namespace PhiRakib\InventoryProduct\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PhiRakib\InventoryProduct\Tests\TestCase;
use PhiRakib\InventoryProduct\Models\Brand;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_brand()
    {
        $brand = [
            'name' => 'Test Brand',
        ];

        $response = $this->post(route('brands.store'), $brand);

        $response->assertStatus(201);

        $this->assertDatabaseHas('brands', $brand);
    }

    public function test_user_can_read_brand()
    {
        $brandName = 'XYZ Brand';
        $brand = Brand::create(['name' => $brandName]);

        $response = $this->get(route('brands.show', $brand->id));

        $response->assertStatus(200)
            ->assertJson(['name' => $brandName]);
    }

    public function test_user_can_read_all_brands()
    {
        $brandNames = ['ABC', 'XYZ'];
        foreach ($brandNames as $brandName) {
            Brand::create(['name' => $brandName]);
        }

        $response = $this->get(route('brands.index'));

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }

    public function test_user_can_update_brand()
    {
        $initialBrandName = 'Test Brand';
        $updatedBrandName = 'Updated Brand';
        $brand = Brand::create(['name' => $initialBrandName]);

        $this->put(route('brands.update', $brand->id), [
            'name' => $updatedBrandName,
        ])->assertStatus(200);

        $this->assertDatabaseHas('brands', ['name' => $updatedBrandName]);
    }

    public function test_user_can_delete_brand()
    {
        $brand = Brand::create(['name' => 'Test Brand']);

        $this->delete(route('brands.destroy', $brand->id))
            ->assertStatus(204);

        $this->assertDatabaseEmpty('brands');
    }
}
