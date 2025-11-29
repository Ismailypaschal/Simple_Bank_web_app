@extends('layouts.app')
@section('content')
    <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0" style="margin: auto;">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center justify-center">
                    <h4 class="mb-0 dark:text-white/80 font-bold">Online Deposit</h4>
                    {{-- <button type="button"
                        class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Settings</button> --}}
                </div>
            </div>
            <form method="POST" action="{{ route('deposit') }}" enctype="multipart/form-data">
                @csrf
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
                <div class="flex-auto p-6">
                    {{-- <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Details</p> --}}
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <label for="amount"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Amount</label>
                                <input type="number" name="amount" value="" placeholder="$30000.00"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-sm font-bold font-medium text-gray-700 mb-1"
                                    for="payment_type">Deposit
                                    Type</label>
                                <select name="deposit_type" id="deposit_type"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-blue-500 focus:outline-none"
                                    required>
                                    <option value="">Select a Payment type</option>
                                    <option value="Bitcoin">Bitcoin</option>
                                    <option value="Dogecoin">Dogecoin</option>
                                    <option value="Ethereum">Ethereum</option>
                                    <option value="Paypal">Paypal</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="deposit_address"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Deposit
                                    Wallet
                                </label>
                                <div class="flex">
                                    <input type="text" name="deposit_address" value=""
                                        placeholder="EW267Y383FSDSTWWGJAHT363F8WHSBSBSSBSHBEV33836UEOD97EY3W8"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        required />
                                    <button type="button"
                                        class="w-15 px-3 bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-800">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2">
                                                <path
                                                    d="M7 9.667A2.667 2.667 0 0 1 9.667 7h8.666A2.667 2.667 0 0 1 21 9.667v8.666A2.667 2.667 0 0 1 18.333 21H9.667A2.667 2.667 0 0 1 7 18.333z" />
                                                <path
                                                    d="M4.012 16.737A2 2 0 0 1 3 15V5c0-1.1.9-2 2-2h10c.75 0 1.158.385 1.5 1" />
                                            </g>
                                        </svg> --}}
                                        copy
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload(Single FIle) x</label>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center bg-gray-50 cursor-pointer hover:bg-gray-100">
                            {{-- <p class="text-sm text-gray-600 font-semibold">Click to upload or drag and drop</p>
                        <p class="text-xs text-gray-500">SVG, PNG, JPG (MAX. 800x400px)</p> --}}
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                    viewBox="0 0 1024 1024">
                                    <path fill="#5E72E4"
                                        d="M128 384v448h768V384zm-32-64h832a32 32 0 0 1 32 32v512a32 32 0 0 1-32 32H96a32 32 0 0 1-32-32V352a32 32 0 0 1 32-32m64-128h704v64H160zm96-128h512v64H256z" />
                                </svg>
                            </div>
                            <input name="deposit_proof" type="file" class="visible" id="dropzone-file">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-1/2 mx-auto block bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                            <g fill="none" stroke="#fff" stroke-linecap="round" stroke-width="1.5">
                                <path
                                    d="M10.625 8.63C10.625 6.625 8.778 5 6.5 5S2.375 6.625 2.375 8.63S3.5 11.74 6.5 11.74s4.5 1.038 4.5 3.63C11 17.963 8.985 19 6.5 19S2 17.375 2 15.37" />
                                <path stroke-linejoin="round"
                                    d="M6.5 3v2m0 16v-2M22 12h-7.5m7.5 0c0 .7-1.994 2.008-2.5 2.5M22 12c0-.7-1.994-2.008-2.5-2.5" />
                            </g>
                        </svg>
                        Deposit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
