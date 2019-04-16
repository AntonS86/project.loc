<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyLink extends Model
{
    protected $table = 'company_links';

    protected $fillable = [
        'name',
        'icon',
        'link'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
