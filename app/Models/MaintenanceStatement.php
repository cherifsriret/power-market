<?php

namespace App\Models;

use App\Casts\DateCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceStatement extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price','maintenance_date', 'description', 'photo', 'technician_name', 'technician_phone', 'building_id'
    ];

    protected $casts = [
        'maintenance_date' => DateCast::class,
    ];


    public function building(){
        return $this->hasOne('App\Models\Building','id','building_id');
    }
}
