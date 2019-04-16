<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'title',
        'phone',
        'email',
        'address',
    ];

    public function companyLinks()
    {
        return $this->hasMany('App\CompanyLink');
    }

}
