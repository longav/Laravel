<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        
        return [
          
            'title' => fake() -> text(20),
            'description' => fake() -> text(30),
            'img_thumbnail'=> fake() -> text(20),
            'price' => rand(1,1000),
            'quantity' => rand(1,20),
             'category_id'=> rand(1,4)
        ];
    }
}
