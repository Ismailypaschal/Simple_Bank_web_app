<?php

namespace App\Http\Controllers\User\Transactions;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditDebitController extends Controller
{
    public function creditDebit() {
        $user = Auth::user();
        $transaction = $user->transactions()->latest()->paginate(5); 
    }
}
