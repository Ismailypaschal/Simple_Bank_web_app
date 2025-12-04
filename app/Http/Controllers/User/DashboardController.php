<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showIndex()
    {
        $user = Auth::user();
        $account = $user->accounts()->first();
        $transactions = $user->transactions()->latest()->take(5)->get();

        // $t = date("H");

        $t = Carbon::now()->format('H');
        if ($t < 12) {
            $greetingUser = 'Good Morning';
        } else if ($t < 17) {
            $greetingUser = 'Good afternoon';
        } else {
            $greetingUser = 'Good evening';
        }
        return view('user.index', compact('user', 'account', 'transactions', 'greetingUser'));
    }
    public function showOnlineDeposit()
    {
        return view('user.online_deposit');
    }
    public function showLoanMortgage()
    {
        return view('user.loan_mortgage');
    }
    public function showDomesticTransfer()
    {
        return view('user.domestic_transfer');
    }
    public function showWireTransfer()
    {
        return view('user.wire_transfer');
    }
    public function showVirtualTransfer()
    {

        $user = Auth::user();
        $cards = $user->cards()->latest()->take(2)->get();
        $default_card = $user->cards()->where('default_card', true)->first();
        if (!$cards) {
            throw new Exception('No card found for user');
        }
        return view('user.virtual_card', compact('cards', 'default_card'));
    }
    public function showCreateVirtualTransfer()
    {
        $user = Auth::user();
        $user_name = $user->first_name . ' ' .  $user->last_name;
        $account = $user->accounts()->first();
        if (!$account) {
            throw new Exception('No account found for user');
        }
        $account_id = $account->id;

        return view('user.create_virtual_card', compact('user_name'));
    }
    public function showAccountManager()
    {
        return view('user.account_manager');
    }
    public function showWithdrawal()
    {
        return view('user.withdrawal');
    }
    public function showProfile()
    {
        return view('user.profile');
    }
}
