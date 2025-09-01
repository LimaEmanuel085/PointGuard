<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inputHoursModel extends Model
{
    protected $table = 'input_hours';

    protected $fillable = [
        'user_id',
        'start_time',
        'end_time',
        'hours_a_day',
        'rest_time',
        'day',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
