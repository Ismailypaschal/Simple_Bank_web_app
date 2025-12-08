@extends('layouts.app')
@section('content')
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div
                class="flex w-full max-w-full justify-between items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent mb-4">
                <h6 class="dark:text-white">WIRE TRANSACTIONS</h6>
                <div class="flex items-center gap-2">
                    <form method="GET" action="" class="flex gap-2 w-full">
                        <label class="flex flex-col h-12 w-full">
                            <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                                <div
                                    class="text-slate-500 dark:text-slate-400 flex border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 items-center justify-center pl-3 rounded-l-lg border-r-0">
                                    <span class="material-symbols-outlined">search</span>
                                </div>
                                <input
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-slate-900 dark:text-white focus:outline-0 focus:ring-0 border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary h-full placeholder:text-slate-500 dark:placeholder:text-slate-400 px-4 pl-2 text-base font-normal leading-normal"
                                    placeholder="Search" value="{{ request('query') }}" name="query" />
                            </div>
                        </label>
                        <button
                            class="flex shrink-0 items-center justify-center rounded-lg h-12 w-12 border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400">
                            <span class="material-symbols-outlined">filter_list</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table
                        class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    S/N</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    AMOUNT</th>
                                    <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    INTEREST RATE</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    MONTH DURATION</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    MONTHLY PAYMENT</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    REASON FOR LOAN</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    DATE</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    LOAN STATUS</th>
                            </tr>
                        </thead>
                        <tbody class="border-t">
                            @foreach ($loans as $loan)
                                <tr style="padding-right: 10px">
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                            {{ $loan->id }}</p>
                                    </td>
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                            ${{ $loan->amount }}</p>
                                    </td>
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-sm font-semibold leading-tight dark:text-white dark:opacity-60">{{ $loan->interest_rate }}</span>

                                    </td>
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-sm font-semibold leading-tight dark:text-white dark:opacity-60">{{ $loan->month_duration }}</span>

                                    </td>
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-sm font-semibold leading-tight dark:text-white dark:opacity-60">{{ $loan->monthly_payment }}</span>

                                    </td>
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-sm font-semibold leading-tight dark:text-white dark:opacity-60">{{ $loan->description }}</span>
                                    </td>
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                            {{ $loan->created_at->format('M d, Y g:i A') }}</p>
                                    </td>
                                    <td
                                        class="text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p
                                            class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                            {{ $loan->status }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($loans->isEmpty())
                                <p class="text-gray-500 text-center h-full">No Loan Transaction record found.</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
