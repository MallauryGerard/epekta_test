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

    /**
     * Automatically load the right description while binding route
     *
     * @var string[]
     */
    protected $with = ['description'];

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
     * A property has one description for the current language
     * Be aware ! Only use this relation on one model (or while binding route).
     * Eager loading is not possible this way.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function description()
    {
        return $this->hasOne(Property_description::class)->where('lang', strtoupper(\App::currentLocale()));
    }

    /**
     * A property has many descriptions (for each translation)
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
