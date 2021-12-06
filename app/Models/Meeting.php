<?php

namespace App\Models;

use App\Casts\DateCast;
use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description','meeting_date', 'meeting_time'
    ];

    protected $casts = [
        'meeting_time' => TimeCast::class,
        'meeting_date' => DateCast::class,
    ];

}
