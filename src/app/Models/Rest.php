<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'attendance_id',
    ];

    protected $casts = [
            'start_time' => 'time',
            'end_time' => 'time',
    ];

    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }
}
