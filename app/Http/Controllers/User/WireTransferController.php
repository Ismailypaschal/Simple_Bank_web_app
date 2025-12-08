<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class WireTransferController extends Controller
{
    public function storeWireTransfer(Request $request)
    {
        Log::info('Domestic Transfer details', $request->all());
        $requestData = []; // prevent undefined variable
        try {
            $requestData = $request->validate([
                'amount' => ['required', 'min:1'],
                'bank_name' => ['required', 'min:3'],
                'country' => ['required'],
                'bene_account_name' => ['required', 'min:6'],
                'account_type' => ['required'],
                'swift_code' => ['required', 'min:8', 'max:11'],
                'routing_number' => ['required', 'min:9', 'max:9'],
                'bene_account_number' => ['required', 'min:10', 'max:10'],
                'description' => ['required', 'max:100'],
            ]);
            $reference = 'WT_' . substr(rand(0, time()), 0, 7);
            $transfer_type = 'wire';

            // Account ID
            $user = Auth::user();
            $account = $user->accounts()->first();
            if (!$account) {
                throw new \Exception('No account found for user');
            }

            $account_id = $account->id;


            $transfer = Transfer::create([
                'account_id' => $account_id,
                'amount' => $requestData['amount'],
                'reference' => $reference,
                'bank_name' => $requestData['bank_name'],
                'country' => $requestData['country'],
                'bene_account_name' => $requestData['bene_account_name'],
                'bene_account_number' => $requestData['bene_account_number'],
                'account_type' => $requestData['account_type'],
                'swift_code' => $requestData['swift_code'],
                'routing_number' => $requestData['routing_number'],
                'transfer_type' => $transfer_type,
                'description' => $requestData['description']
            ]);

            // Select User Account Balance
            // $account = Account::where('id', $account_id)
            // ->select('balance')
            // ->first();
            $account = Account::findOrFail($account_id);
            // Update Account Balance
            $account->update([
                'balance' => $account->balance - $requestData['amount']
            ]);

            // Insert Transaction
            $transaction = Transaction::create([
                'account_id' => $account_id,
                'reference' => $reference,
                'type' => 'debit',
                'amount' => $requestData['amount'],
                'balance_before' => $account->balance + $requestData['amount'],
                'balance_after' => $account->balance - $requestData['amount'],
                'category' => 'transfer',
                'description' => $requestData['description'],
                'source_account' => $account->account_number,
                'destination_account' => $requestData['bene_account_number']
            ]);
        } catch (\Exception $e) {
            $bene = $requestData['bene_account_number'] ?? 'this beneficiary account';

            return back()->with('error', 'There was an error transferring to: $bene' . $e->getMessage());
        }
        return redirect()->route('user.dashboard')->with('success', 'Your Transfer to account no: ' . $requestData['bene_account_number'] . ' was successful!');
    }
}
