<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Board;
use App\Models\Column;
use App\Models\User;

class ColumnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Column::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'owner_id' => User::factory(),
            'board_id' => Board::factory(),
            'order' => $this->faker->randomNumber(),
        ];
    }
}
