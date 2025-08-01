<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_time' => $this->faker->time('H:i:s'),
            'end_time' => $this->faker->time('H:i:s'),
            'note' => $this->faker->optional()->sentence,
            'work_date' => $this->faker->date,
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),//
        ];
    }
}
