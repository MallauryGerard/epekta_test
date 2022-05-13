<?php

namespace App\Models;

use App\Enums\LangsEnum;
use Illuminate\Database\Eloquent\Model;

class Property_description extends Model
{
    protected $casts = [
        'lang' => LangsEnum::class,
    ];
}
