<?php

namespace Database\Factories;

use App\Models\OdysseyBook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OdysseyBook>
 */
class OdysseyBookFactory extends Factory
{
    protected $model = OdysseyBook::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph,
            'page_number' => $this->faker->numberBetween(1, 500)
        ];
    }
}
