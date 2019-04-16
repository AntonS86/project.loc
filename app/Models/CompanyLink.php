<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyLink extends Model
{
    /**
     * @var string
     */
    protected $table = 'company_links';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'icon',
        'link'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo('App\Models\Company');
    }
}
