<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = [];

    public function accounts() {
        return $this->belongsTo(Account::class);
    }
}
