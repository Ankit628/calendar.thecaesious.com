<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'event_startDate',
        'event_endDate',
        'event_startTime',
        'event_endTime',
        'event_description',
        'event_priority',
        'event_recursion',
        'event_repeating_days',
        'event_data'
    ];

    protected $casts = [
        'event_data' => 'array',
        'event_repeating_days' => 'array',
    ];
}
