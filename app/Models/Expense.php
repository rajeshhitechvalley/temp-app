<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
    protected $fillable=['title','amount','expense_date','member_id'];

    public function member() {
        return $this->belongsTo(Member::class);
    }
}

