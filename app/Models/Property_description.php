<?php

namespace App\Models;

use App\Enums\LangsEnum;
use Illuminate\Database\Eloquent\Model;

class Property_description extends Model
{
    protected $casts = [
        'lang' => LangsEnum::class,
    ];

    /**
     * A description belongs to a property
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Property()
    {
        return $this->BelongsTo(Property::class);
    }
}
