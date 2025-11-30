<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\Deposit;
use App\Models\Account;
use App\Models\Transaction;

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
            $account = Account::findOrFail($account_id);

            $account->update([
                'balance' => $account->balance + $requestData['amount']
            ]);

            // $account = Account::where('user_id', $user->id)->update([
            //     'balance' => $requestData['amount']
            // ]);

            // Transaction
            $reference = 'DEP-' . substr(rand(0, time()), 0, 7);
            $description = 'Deposited: ' . '₦' . $requestData['amount'];
            $transaction = Transaction::create([
                'account_id' => $account_id,
                'reference' => $reference,
                'type' => 'debit',
                'amount' => $requestData['amount'],
                'balance_before' => $account->balance + $requestData['amount'],
                'balance_after' => $account->balance - $requestData['amount'],
                'category' => 'transfer',
                'description' => $description,
                'source_account' => $account->account_number,
                'destination_account' => $requestData['deposit_address']
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'There was an error depositing your account: ' . $e->getMessage());
        }

        return redirect()->route('user.dashboard')->with('success', 'Your deposit was successful');
    }
}
