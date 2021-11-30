<?php

namespace App\Models;

use App\Helpers\Traits\CRUDIdentifier;
use App\Helpers\Traits\FindByUid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{

    //Softdelete
    protected $dates = ['deleted_at'];

    // protected $casts = [
    //     'name' => SafeCast::class,
    //     'guard_name' => SafeCast::class,
    //     'display_name' => SafeCast::class,
    //     'locked' => SafeCast::class,
    // ];

}
