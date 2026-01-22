<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'person_name', 'mobile_no', 'amount', 'date_taken', 'interest', 'duration'
    ];

    public function getCountdownAttribute()
    {
        $end = Carbon::parse($this->date_taken)->addDays($this->duration);
        $now = Carbon::now();
        if ($now->greaterThan($end)) {
            return 'Ended';
        }
        return $now->diffForHumans($end, [ 'parts' => 3, 'short' => true, 'syntax' => Carbon::DIFF_ABSOLUTE ]);
    }
}
