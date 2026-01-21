<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','mobile','address'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
