<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
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

    /**
     * @var array
     */
    protected $casts = [
        'event_data' => 'array',
        'event_repeating_days' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
