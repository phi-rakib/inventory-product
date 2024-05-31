<?php

namespace PhiRakib\InventoryProduct\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PhiRakib\InventoryProduct\Models\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        $migrationPath = __DIR__ . '/../database/migrations/create_categories_table.php';
        $migration = require $migrationPath;
        $migration->up();
    }
    public function test_user_can_create_a_category()
    {
        $categoryName = 'Laptop';

        $response = $this->post(route('categories.store'), [
            'name' => $categoryName
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('categories', [
            'name' => $categoryName
        ]);
    }

    public function test_user_can_read_all_categories()
    {
        $categoryNames = [
            'Laptop',
            'Mobile'
        ];

        foreach ($categoryNames as $categoryName) {
            Category::create([
                'name' => $categoryName
            ]);
        }

        $response = $this->get(route('categories.index'));

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }

    public function test_user_can_read_a_category()
    {
        $categoryName = 'Laptop';
        $category = Category::create([
            'name' => $categoryName
        ]);

        $response = $this->get(route('categories.show', $category->id));

        $response->assertStatus(200)
            ->assertJson([
                'name' => $categoryName
            ]);
    }

    public function test_user_can_update_a_category()
    {
        $initialCategoryName = 'Laptop';
        $updatedCategoryName = 'Mobile';

        $category = Category::create([
            'name' => $initialCategoryName
        ]);

        $response = $this->put(route('categories.update', $category->id), [
            'name' => $updatedCategoryName
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('categories', [
            'name' => $updatedCategoryName
        ]);
    }

    public function test_user_can_delete_a_category()
    {
        $categoryName = 'Laptop';
        $category = Category::create([
            'name' => $categoryName
        ]);

        $response = $this->delete(route('categories.destroy', $category->id));

        $response->assertStatus(204);

        $this->assertDatabaseMissing('categories', [
            'name' => $categoryName
        ]);
    }
}
