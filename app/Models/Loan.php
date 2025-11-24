<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = [];

    public function payments() {
        return $this->hasMany(LoanPayment::class);
    }
}
