<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Card;
use App\Models\Column;
use App\Models\User;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'notes' => $this->faker->text(),
            'user_id' => User::factory(),
            'column_id' => Column::factory(),
            'order' => $this->faker->randomNumber(),
        ];
    }
}
