<?php

namespace App\Models;

use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use FormatDate, InteractsWithMedia;

    const CURRENCY = [
        'en' => '$',
        'fr' => '€',
    ];

    protected $table = 'Properties';
    public static $media_collection = 'property';

    /**
     * A property belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    /**
     * A property has many description (for each translation)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descriptions()
    {
        return $this->hasMany(Property_description::class);
    }

    /**
     * @return string
     */
    public function getFormattedPrice() {
        if (\App::currentLocale() == 'fr') {
            $formatted = number_format($this->price, 2, ',', ' ');
        } else {
            $formatted = number_format($this->price, 2, '.', ',');
        }
        return $formatted . ' ' . self::CURRENCY[\App::currentLocale()];
    }
}
