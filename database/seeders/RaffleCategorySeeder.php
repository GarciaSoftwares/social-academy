<?php

namespace Database\Seeders;

use App\Models\RaffleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RaffleCategorySeeder extends Seeder
{
    /**
     * Default categories.
     *
     * @var array|string[]
     */
    private array $categories = [
        'Electronics',
        'Vehicles',
        'Sports',
        'Children',
        'Services',
        'Real Estate',
        'Furniture',
        'Charitable',
        'Health & Beauty',
        'African Beauty',
        'Agriculture',
        'Games',
        'Others'
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            RaffleCategory::factory()->create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
