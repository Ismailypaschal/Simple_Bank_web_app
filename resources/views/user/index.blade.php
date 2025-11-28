@extends('layouts.app')
@section('content')
    <div class="flex-1">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            <!-- My Accounts -->
            <div class="rounded-xl border border-slate-200 bg-white p-4 sm:p-6 dark:border-slate-800 dark:bg-slate-900">
                <!-- Greeting and Total Balance -->
                <div class="mb-8">
                    {{-- flash messages --}}
                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-500 rounded-lg text-center">{{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-lg text-center">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded text-center">
                            <ul class="text-sm text-red-600 list-disc pl-5">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1 class="text-3xl font-bold text-dark-500 text-center dark:text-white">{{ $greetingUser }},
                        {{ $user->first_name }}
                    </h1>
                    <p class="mt-1 text-base text-center dark:text-white">Here's your financial overview for today.</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-4">
                    <div
                        class="w-16 h-16 mb-2 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                        <i class="relative text-xl leading-none text-white opacity-100 fas fa-landmark top-31/100"></i>
                    </div>
                    <h3 class="text-3xl font-bold leading-tight tracking-[-0.015em] text-slate-900 dark:text-white">Total
                        Balance</h3>
                    <div class="flex flex-col gap-4">
                        <div>
                            <p class="text-3xl font-bold text-slate-900 dark:text-white" style="font-size: 30px">
                                ${{ $account ? $account->balance : '0.00' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8 mt-4">
                <!-- Left Column -->
                <div class="flex flex-col gap-6 lg:col-span-2">
                    <!-- Quick Actions -->
                    <div>
                        {{-- <h3 class="text-lg font-bold leading-tight tracking-[-0.015em] text-slate-900 dark:text-white">Quick
                            Actions</h3> --}}
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div
                                class="mb-4 flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-900">
                                <span class="material-symbols-outlined text-blue-600">arrow_upward</span>
                                <div class="flex flex-col gap-1">
                                    <h2 class="font-bold leading-tight text-slate-800 dark:text-white">Send Money</h2>
                                    <p class="text-sm font-normal leading-normal text-slate-500 dark:text-slate-400">Send
                                        funds instantly</p>
                                </div>
                            </div>
                            <div
                                class="mb-4 flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-900">
                                <span class="material-symbols-outlined text-blue-600">arrow_downward</span>
                                <div class="flex flex-col gap-1">
                                    <h2 class="font-bold leading-tight text-slate-800 dark:text-white">Request Money</h2>
                                    <p class="text-sm font-normal leading-normal text-slate-500 dark:text-slate-400">Request
                                        funds from others</p>
                                </div>
                            </div>
                            <div
                                class="mb-4 flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-900">
                                <span class="material-symbols-outlined text-blue-600">credit_card</span>
                                <div class="flex flex-col gap-1">
                                    <h2 class="font-bold leading-tight text-slate-800 dark:text-white">Manage Cards</h2>
                                    <p class="text-sm font-normal leading-normal text-slate-500 dark:text-slate-400">View
                                        and control your cards</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recent Transactions -->
                    <div
                        class="rounded-xl border border-slate-200 bg-white p-4 sm:p-6 dark:border-slate-800 dark:bg-slate-900">
                        <h3 class="text-lg font-bold leading-tight tracking-[-0.015em] text-slate-900 dark:text-white">
                            Recent Transactions</h3>
                        <div class="mt-4 flow-root">
                            <ul class="divide-y divide-slate-200 dark:divide-slate-800" role="list">
                                @foreach ($transactions as $transaction)
                                    <li class="py-4">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800">
                                                <span
                                                    class="material-symbols-outlined text-slate-500 dark:text-slate-400">shopping_cart</span>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="truncate font-medium text-slate-900 dark:text-white">
                                                    {{ $transaction->description }}</p>
                                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                                                    {{ $transaction->created_at->format('M d, Y g:i A') }}</p>
                                            </div>
                                            <div class="text-right">
                                                @if ($transaction->type == 'debit')
                                                    <p class="font-semibold text-red-600">
                                                        -${{ number_format($transaction->amount, 2) }}</p>
                                                @endif
                                                <p class="font-semibold text-green-600">
                                                    -${{ number_format($transaction->amount, 2) }}</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                                    {{ $transaction->type }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            @if ($transactions->isEmpty())
                                <p class="text-gray-500 text-center h-full">No Order found.</p>
                            @endif
                        </div>
                    </div>
                    {{--  --}}
                    <div
                        class="mt-4 rounded-xl border border-slate-200 bg-white p-4 sm:p-6 dark:border-slate-800 dark:bg-slate-900">
                        <h2 class="text-xl font-bold text-black mb-4">Monthly Spending</h2>
                        <div class="relative w-full h-48 flex items-center justify-center my-4">
                            <svg class="w-full h-full" viewbox="0 0 36 36">
                                <path
                                    d="M18 2.0845
                                                                                               a 15.9155 15.9155 0 0 1 0 31.831
                                                                                               a 15.9155 15.9155 0 0 1 0 -31.831"
                                    fill="none" stroke="#243347" stroke-width="3">
                                </path>
                                <path
                                    d="M18 2.0845
                                                                                               a 15.9155 15.9155 0 0 1 0 31.831"
                                    fill="none" stroke="#2a7aea" stroke-dasharray="75, 100" stroke-linecap="round"
                                    stroke-width="3">
                                </path>
                            </svg>
                            <div class="absolute flex flex-col items-center">
                                <p class="text-sm text-[#92a9c8]">Total Spent</p>
                                <p class="text-2xl font-bold text-black">$1,845</p>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                                    <p class="text-black">Shopping</p>
                                </div>
                                <p class="font-bold text-black">$780</p>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                                    <p class="text-black">Food &amp; Drink</p>
                                </div>
                                <p class="font-bold text-black">$450</p>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-orange-400"></span>
                                    <p class="text-black">Transport</p>
                                </div>
                                <p class="font-bold text-black">$215</p>
                            </li>
                        </ul>
                    </div>
                    <!-- Loans & Mortgages -->
                    <div
                        class="mt-4 rounded-xl border border-slate-200 bg-white p-4 sm:p-6 dark:border-slate-800 dark:bg-slate-900">
                        <h3 class="text-lg font-bold leading-tight tracking-[-0.015em] text-slate-900 dark:text-white">
                            Loans &amp; Mortgages</h3>
                        <div class="mt-4 flex flex-col gap-4">
                            <div>
                                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Home Mortgage</p>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">$285,482.10</p>
                                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Remaining Balance</p>
                            </div>
                            <div class="h-px bg-black dark:bg-slate-800 mb-4"></div>
                            <div>
                                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Next Payment Due</p>
                                <p class="font-semibold text-slate-800 dark:text-slate-200">Nov 1, 2023</p>
                            </div>
                            <button class="mt-2 w-full h-10 rounded-lg bg-blue-500 text-sm font-bold text-white">View Loan
                                Details</button>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="flex flex-col gap-6 lg:gap-8">
                </div>
            </div>
        </div>
    </div>
@endsection
