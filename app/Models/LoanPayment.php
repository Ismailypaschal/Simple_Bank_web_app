<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function account(): mixed {
        return $this->hasOneThrough(Account::class, User::class);
    }
}
