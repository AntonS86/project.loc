<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'phone',
        'email',
        'address',
    ];

    /**
     * @return HasMany
     */
    public function companyLinks(): HasMany
    {
        return $this->hasMany('App\Models\CompanyLink');
    }

}
