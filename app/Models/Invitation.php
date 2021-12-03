<?php

namespace App\Models;

use App\Casts\DateCast;
use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Invitation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visitor_name','code', 'visit_from_date', 'visit_from_time','visit_to_date','visit_to_time','visit_type','user','user_id',
    ];

    protected $casts = [
        'visit_from_date' => DateCast::class,
        'visit_from_time' => TimeCast::class,
        'visit_to_date' => DateCast::class,
        'visit_to_time' => TimeCast::class,
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function generateCode()
    {
        return Date::now()->format('Y') . '-' . (1 * 100) . '-' . uniqid();
    }
}
