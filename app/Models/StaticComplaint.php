<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticComplaint extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name','national_id', 'address', 'phone', 'email', 'description'];
}
