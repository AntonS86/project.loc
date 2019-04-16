<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Phone extends Model
{
    protected $fillable = [
        'number'
    ];

    /**
     * @return HasMany
     */
    public function workMessages(): HasMany
    {
        return $this->hasMany('App\WorkMessage');
    }

    /**
     * @param string $phone
     *
     * @return string
     */
    public function phoneReplace(string $phone): string
    {
        $patterns     = '#^(8|\+8|\+7|\+|7)?(\d+)$#';
        $replacements = '7${2}';
        return preg_replace($patterns, $replacements, $phone);
    }
}
