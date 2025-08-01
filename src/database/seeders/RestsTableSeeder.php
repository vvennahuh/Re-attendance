<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Rest;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::all()->each(function ($attendance) {
            Rest::factory(2)->create([
                'attendance_id' => $attendance->id,
            ]);
        });//
    }
}
