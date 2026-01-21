<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['member_id','amount','mode','purpose','donation_date'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
