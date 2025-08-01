<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Attendance;

class ModificationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'attendance_id' => Attendance::inRandomOrder()->first()?->id ?? Attendance::factory(),
            'reason' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'submitted_at' => now(),
            'approved_at' => $this->faker->optional()->dateTime,//
        ];
    }
}
