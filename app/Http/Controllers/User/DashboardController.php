<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showIndex() {
        return view('user.index');
    }
    public function showOnlineDeposit() {
        return view('user.online_deposit');
    }
    public function showLoanMortgage() {
        return view('user.loan_mortgage');
    }
    public function showDomesticTransfer() {
        return view('user.domestic_transfer');
    }
    public function showWireTransfer() {
        return view('user.wire_transfer');
    }
    public function showVirtualTransfer() {
        return view('user.virtual_card');
    }
    public function showAccountManager() {
        return view('user.account_manager');
    }
    public function showWithdrawal() {
        return view('user.withdrawal');
    }
    public function showProfile() {
        return view('user.profile');
    }
}
