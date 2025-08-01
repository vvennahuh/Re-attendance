<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\ModificationRequest;

class ModificationRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::all()->each(function ($attendance) {
            ModificationRequest::factory()->create([
                'user_id' => $attendance->user_id,
                'attendance_id' => $attendance->id,
            ]);
        });//
    }
}
