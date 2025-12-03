<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VirtualCardController extends Controller
{
    public function generateCard(Request $request) {
        $requestData = $request->validate([
            'card_name' => ['required'],
            'card_number' => ['required'],
            'expiry_date' => ['required'],
            'card_type' => ['required'],
        ]);
    }
}
