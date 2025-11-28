<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\Deposit;

class DepositController extends Controller
{
    public function storeDeposit(Request $request) {
        try {
            $requestData = $request->validate([
            'amount' => ['required', 'min:1'],
            'deposit_type' => ['required'],
            'deposit_address' => ['required'],
            'deposit_proof' => ['required', File::types(['png', 'jpg', 'svg', 'webp', 'max::2048']
            )],  // max 2MB
        ]);
        if($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = time(). '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('PaymentProofs', $filename, 'public');
            $requestData['deposit_proof'] = '/storage/' . $filePath;
        }    
        $deposit = Deposit::create($requestData);
        } catch(\Exception $e) {
            return back()->with('error', 'There was an error depositing your account: ' . $e->getMessage());
        }

        return redirect()->route('user.dashboard')->with('success', 'Your deposit was successful');
    }
}
