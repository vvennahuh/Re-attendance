<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startHour   = $this->faker->numberBetween(8, 12);
        $startMinute = $this->faker->randomElement([0, 15, 30, 45]);
        $start = Carbon::today()->setTime($startHour, $startMinute, 0);
        $end = (clone $start)->addHours(8);
        
        return [
            'work_date'  => $start->toDateString(),
            'start_time' => $start->format('H:i:s'),
            'end_time'   => $end->format('H:i:s'),
            'note'       => $this->faker->optional()->sentence(),
        ];
    }
}
