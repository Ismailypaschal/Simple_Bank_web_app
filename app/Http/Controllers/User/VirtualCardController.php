<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Carbon\Carbon;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Exception;

class VirtualCardController extends Controller
{
    public function generatevirtualCard(Request $request)
    {
        try {
            $requestData = $request->validate([
                'card_name' => ['required'],
                'card_number' => ['required'],
                'card_type' => ['required'],
            ]);
            $user = Auth::user();
            $account = $user->accounts()->first();
            if (!$account) {
                throw new \Exception('No Account found for user');
            }
            $account_id = $account->id;

            // Generate expiry date server-side: 2 years from now, as first day of the month (common for card expiry)
            $expiryDate = Carbon::now()->addYears(2)->startOfMonth()->format('Y-m-d');

            // Check if this card should be default
            $isDefault = $request->has('default_card') ? true : false;

            // If this card is default, remove default from all other cards for this account
            if ($isDefault) {
                Card::where('account_id', $account_id)
                    ->update(['default_card' => false]);
            }

            $card = Card::create([
                'account_id' => $account_id,
                'card_name' => $requestData['card_name'],
                'card_number' => $requestData['card_number'],
                'expiry_date' => $expiryDate,
                'type' => $requestData['card_type'],
                'default_card'=> $isDefault,
            ]);
        } catch (Exception $e) {
            return back()->with('error', 'There was an error generating your virtual card: ' . $e->getMessage());
        }

        return redirect()->route('virtual_card')->with('success', 'Your virtual card creation was successful');
    }
}
