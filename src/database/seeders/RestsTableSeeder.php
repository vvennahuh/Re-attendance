<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Rest;
use Carbon\Carbon;

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

            $start = Carbon::today()->setTimeFromTimeString($attendance->start_time);
            $end   = Carbon::today()->setTimeFromTimeString($attendance->end_time);

            if ($end->lessThanOrEqualTo($start) || $end->diffInMinutes($start) < 60) {
                return;
            }

            $latestStart = $end->copy()->subMinutes(60);

            $randTs = random_int($start->getTimestamp(), $latestStart->getTimestamp());
            $restStart = Carbon::createFromTimestamp($randTs);
            $restEnd   = $restStart->copy()->addHour();

            Rest::factory()->create([
                'attendance_id' => $attendance->id,
                'start_time'    => $restStart->format('H:i:s'),
                'end_time'      => $restEnd->format('H:i:s'),
            ]);
        });//
    }
}
