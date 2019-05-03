<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    /**
     * @return BelongsTo
     */
    public function real_estate(): BelongsTo
    {
        return $this->belongsTo('App\Models\RealEstate');
    }
}
