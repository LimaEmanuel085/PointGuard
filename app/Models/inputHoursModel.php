<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inputHoursModel extends Model
{
    protected $table = 'input_hours';

    protected $fillable = [
        'user_id',
        'hours_a_day',
        'rest_time',
        'day',
    ];
}
