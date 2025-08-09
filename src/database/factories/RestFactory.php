<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = Carbon::today()->setTime(0,0,0);
        $end   = $start->copy()->addMinutes(60);
        
        return [
            'start_time' => $start->format('H:i:s'),
            'end_time'   => $end->format('H:i:s'),
        ];
    }
}
