<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function showIndex()
    {
        $user = auth()->user();
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
        return view('user.virtual_card');
    }
    public function showCreateVirtualTransfer()
    {
        return view('user.create_virtual_card');
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
