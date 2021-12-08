<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningCompany extends Model
{
    use HasFactory;
    protected $fillable=['name','address','phone','responsable','maps','photo'];

}
