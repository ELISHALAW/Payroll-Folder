<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'registration_no',
        'sst_no',
        'address',
        'city',
        'postcode',
        'state',
        'epf_employer_no',
        'socso_employer_no',
        'tax_employer_no'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
