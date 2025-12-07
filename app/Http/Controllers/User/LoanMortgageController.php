<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanMortgageController extends Controller
{
    public function storeLoanMortgage(Request $request)
    {
        try {
            $data = $request->validate([
                'amount' => ['required'],
                'interest_rate' => ['required'],
                'month_duration' => ['required'],
                'monthly_payment' => ['required'],
                'description' => ['required'],
            ]);
            $user = Auth::user();
            if (!$user) {
                throw new Exception('No user found');
            }
            $user_id = $user->id;

            // Store Data
            $loan = Loan::create([
                'user_id' => $user_id,
                'amount' => $data['amount'],
                'interest_rate' => $data['interest_rate'],
                'duration_months' => $data['month_duration'],
                'monthly_payment' => $data['monthly_payment'],
                'description' => $data['description']
            ]);
        } catch (Exception $e) {
            return back()->with('error', 'There was an error processing your loan!' . $e->getMessage());
        }
        return redirect()->route('user.dashboard')->with('success', 'Successful! Processing wait for some minutes you will receive a second mail');
    }
}
