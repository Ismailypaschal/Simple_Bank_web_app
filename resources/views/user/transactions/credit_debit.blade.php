@extends('layouts.app')
@section('content')
    <div class="flex-none w-full max-w-full px-3 h-full max-h-full ">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div
                class="flex w-full max-w-full justify-between items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent mb-4">
                <h6 class="dark:text-white">CREDIT/DEBIT TRANSACTIONS</h6>
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
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    TYPE</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    SENDER / RECEIVER</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    DESCRIPTION</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    CREATED AT</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    TIME CREATED</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-blue-500 opacity-20">
                                    STATUS</th>
                            </tr>
                        </thead>
                        <tbody class="border-t">
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2">
                                        <div>
                                            <img src="../assets/img/small-logos/logo-spotify.svg"
                                                class="inline-flex items-center justify-center mr-2 text-sm text-white transition-all duration-200 ease-in-out rounded-full h-9 w-9"
                                                alt="spotify" />
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">Spotify</h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                        $2,500</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">working</span>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                        $2,500</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                        $2,500</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                        $2,500</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                        $2,500</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                        $2,500</p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
