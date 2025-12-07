@extends('layouts.app')
@section('content')
    <div class="max-w-full px-3 lg:w-2/3 lg:flex-none">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 xl:mb-0 xl:w-1/2 xl:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="relative overflow-hidden rounded-2xl"
                        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg')">
                        <span
                            class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 opacity-80"></span>
                        <div class="relative z-10 flex-auto p-4">
                            {{-- <i class="p-2 text-white fas fa-wifi"></i> --}}
                            <i class="fa-solid fa-sim-card fa-rotate-270 fa-2xl" style="color: #FFD43B;"></i>
                            <h5 class="pb-2 mt-6 mb-12 text-white preview_card_number">
                                4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                            <div class="flex">
                                <div class="flex">
                                    <div class="mr-6">
                                        <p class="mb-0 text-sm leading-normal text-white opacity-80">Card Holder</p>
                                        <h6 class="mb-0 text-white">{{ $user_name }}</h6>
                                    </div>
                                    <div>
                                        <p class="mb-0 text-sm leading-normal text-white opacity-80">Expires</p>
                                        <h6 class="mb-0 text-white" id="preview_expiry_date">11/27</h6>
                                    </div>
                                </div>
                                <div class="flex items-end justify-end w-1/5 ml-auto">
                                    <img class="w-3/5 mt-2" src="../assets/img/logos/mastercard.png" id="card_type_img"
                                        alt="logo" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
                <div class="flex flex-wrap -mx-3">
                    {{-- <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                                    <i
                                        class="relative text-xl leading-none text-white opacity-100 fas fa-landmark top-31/100"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center dark:text-white">Salary</h6>
                                <span class="text-xs leading-tight dark:text-white dark:opacity-80">Belong
                                    Interactive</span>
                                <hr
                                    class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                <h5 class="mb-0 dark:text-white">+$2000</h5>
                            </div>
                        </div>
                    </div> --}}
                    <div class="w-full max-w-full px-3 mt-6 md:mt-0 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                                    {{-- <i class="relative text-xl leading-none text-white opacity-100 fab fa-paypal top-31/100"></i> --}}
                                    <i class="relative text-xl leading-none text-white opacity-100 top-31/100 fa-regular fa-credit-card "
                                        style="color: #dcdfe5;"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center dark:text-white">E-Pay</h6>
                                <span class="text-xs leading-tight dark:text-white dark:opacity-80">Card Limit</span>
                                <hr
                                    class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                <h5 class="mb-0 dark:text-white">$5000.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0 dark:text-white">Available User Cards</h6>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                <div
                                    class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none md-max:overflow-auto rounded-xl border-slate-100 dark:border-slate-700 bg-clip-border">
                                    <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/mastercard.png" alt="logo" />
                                    <h6 class="mb-0 dark:text-white preview_card_number" id="">
                                        ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                                    <i class="ml-auto cursor-pointer fas fa-pencil-alt text-slate-700"
                                        data-target="tooltip_trigger" data-placement="top"></i>
                                    <div data-target="tooltip"
                                        class="hidden px-2 py-1 text-sm text-white bg-black rounded-lg">
                                        Edit Card
                                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                            data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                                <div
                                    class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none md-max:overflow-auto rounded-xl border-slate-100 dark:border-slate-700 bg-clip-border">
                                    <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/visa.png" alt="logo" />
                                    <h6 class="mb-0 dark:text-white">
                                        ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                                    <i class="ml-auto cursor-pointer fas fa-pencil-alt text-slate-700"
                                        data-target="tooltip_trigger" data-placement="top"></i>
                                    <div data-target="tooltip"
                                        class="hidden px-2 py-1 text-sm text-white bg-black rounded-lg">
                                        Edit Card
                                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                            data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
        <div
            class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap mx-auto">
                    <div class="flex items-center flex-none max-w-full px-3">
                        <h6 class="mb-0 dark:text-white">Create a New Virtual Card</h6>
                    </div>
                    <span class="text-xs leading-tight dark:text-white dark:opacity-80">Customize your card for secure
                        online spending</span>
                </div>
            </div>
            <form method="POST" action="{{ route('store.virtual_card') }}">
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
                <div class="flex flex-col gap-6 p-4 bg-white dark:bg-gray-900/50 ">
                    {{-- Card Name --}}
                    <div class="mb-4">
                        <label for="card_name"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Card
                            Name</label>
                        <input type="text" name="card_name" value="{{ $user_name }}" placeholder="{{ $user_name }}"
                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            required readonly />
                    </div>
                    {{-- Card Type --}}
                    <div class="w-full max-w-full shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label class="block text-sm font-bold font-medium text-gray-700 mb-1" for="card_type">Card Type
                            </label>
                            <select name="card_type" id="card_type"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-blue-500 focus:outline-none"
                                required>
                                <option value="">Select Card Type</option>
                                <option value="Visa">Visa</option>
                                <option value="Mastercard">mastercard</option>
                                <option value="Verve">Verve</option>
                                <option value="American Express">American Express</option>
                                <option value="Discover">Discover</option>
                            </select>
                        </div>
                    </div>
                    {{-- Card Number --}}
                    <div class="mb-4">
                        <label for="card_number"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Card
                            Number</label>
                        <input type="text" name="card_number" id="card_number" value=""
                            placeholder="5592 6064 5055 9403"
                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            required readonly />
                    </div>
                    {{-- Card Expiry date --}}
                    {{-- <div class="mb-4">
                        <label for="expiry_date"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Expiry
                            Date</label>
                        <input type="text" name="expiry_date" id="expiry_date" value="" placeholder="12/27"
                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            required readonly />
                    </div> --}}
                    {{-- <div class="mb-4">
                    <div class="flex justify-between items-center pb-2">
                        <label for="limit"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Spending
                            Limit</label>
                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400 text-base cursor-help"
                            title="Set a monthly or one-time limit.">info</span>
                    </div>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <span class="text-gray-500 dark:text-gray-400 sm:text-sm">$</span>
                        </div>
                        <input type="limit" name="limit" value="" placeholder="500.00"
                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none pl-4 "
                            required />
                    </div>
                </div> --}}
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <label for="default"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Set as
                                default
                                card</label>
                        </div>
                        <input class="" name="default_card" id="default-toggle" type="checkbox" value="1" />
                    </div>
                    <button type="submit"
                        class="w-full mx-auto block bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-800"
                        id="generate_card">
                        Create My Virtual Card
                    </button>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection
