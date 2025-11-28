<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\Deposit;
use App\Models\Account;

class DepositController extends Controller
{
    public function storeDeposit(Request $request)
    {
        try {
            $requestData = $request->validate([
                'amount' => ['required', 'min:1'],
                'deposit_type' => ['required'],
                'deposit_address' => ['required'],
                'deposit_proof' => ['required', File::types(
                    ['png', 'jpg', 'svg', 'webp', 'max::2048']
                )],  // max 2MB
            ]);
            if ($request->hasFile('payment_proof')) {
                $file = $request->file('payment_proof');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('PaymentProofs', $filename, 'public');
                $requestData['deposit_proof'] = '/storage/' . $filePath;
            }
            $user = auth()->user();

            $account = $user->accounts()->first();
            if (!$account) {
                throw new \Exception('No account found for user');
            }
            $account_id = $account->id;
            $deposit = Deposit::create([
                'account_id' => $account_id,
                'amount' => $requestData['amount'],
                'deposit_type' => $requestData['deposit_type'],
                'deposit_address' => $requestData['deposit_address'],
                'deposit_proof' => $requestData['deposit_proof']
            ]);

            $account = Account::where('user_id', $user->id)->update([
                'balance' => $requestData['amount']
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'There was an error depositing your account: ' . $e->getMessage());
        }

        return redirect()->route('user.dashboard')->with('success', 'Your deposit was successful');
    }
}
