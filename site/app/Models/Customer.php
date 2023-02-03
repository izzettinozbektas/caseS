<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasUuids;
    protected $fillable = [
        'name',
        'lastName',
        'company',
        'photo',
        'contactInformation'
    ];
    public $timestamps = false;

}
