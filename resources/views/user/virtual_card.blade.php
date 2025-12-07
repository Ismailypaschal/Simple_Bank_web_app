@extends('layouts.app')
@section('content')
    <div class="max-w-full px-3 lg:w-2/3 lg:flex-none">
        <div class="flex flex-wrap -mx-3">
            @php
                $fallback_number = '3434 3535 3464 2526';
                $fallback_name = $user->first_name . ' ' . $user->last_name;
                $fallback_expiry = now()->addYears(2)->format('m/y');
                $fallback_type = 'Visa'; // For the logo
            @endphp
            {{-- If virtual card is not yet --}}
            @if ($total_card === 0)
                <div class="w-full max-w-full px-3 mb-6 xl:mb-0 xl:w-1/2 xl:flex-none">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                        <div class="relative overflow-hidden rounded-2xl"
                            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg')">
                            <span
                                class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 opacity-80"></span>
                            <div class="relative z-10 flex-auto p-4">
                                <i class="fa-solid fa-sim-card fa-rotate-270 fa-2xl" style="color: #FFD43B;"></i>
                                @if ($total_card < 1)
                                    <span class="pl-3 text-white">
                                    Demo card
                                </span>
                                @endif
                                <h5 class="pb-2 mt-6 mb-12 text-white">
                                    {{ $fallback_number }}
                                </h5>
                                
                                <div class="flex">
                                    <div class="flex">
                                        <div class="mr-6">
                                            <p class="mb-0 text-sm leading-normal text-white opacity-80">Card Holder</p>
                                            <h6 class="mb-0 text-white">{{ $fallback_name }}</h6>
                                        </div>
                                        <div>
                                            <p class="mb-0 text-sm leading-normal text-white opacity-80">Expires</p>
                                            <h6 class="mb-0 text-white">
                                                {{ $fallback_expiry }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-end w-1/5 ml-auto">
                                        <img class="w-3/5 mt-2" src="../assets/img/logos/mastercard.png" alt="logo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- end if virtual card is not yet --}}


            {{-- If virtual card is not null --}}
            @if ($total_card !== 0)
                <div class="w-full max-w-full px-3 mb-6 xl:mb-0 xl:w-1/2 xl:flex-none">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                        <div class="relative overflow-hidden rounded-2xl"
                            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg')">
                            <span
                                class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 opacity-80"></span>
                            <div class="relative z-10 flex-auto p-4">
                                <i class="fa-solid fa-sim-card fa-rotate-270 fa-2xl" style="color: #FFD43B;"></i>
                                <h5 class="pb-2 mt-6 mb-12 text-white">
                                    {{ $default_card->card_number ?? $option_card->card_number }}
                                </h5>
                                <div class="flex">
                                    <div class="flex">
                                        <div class="mr-6">
                                            <p class="mb-0 text-sm leading-normal text-white opacity-80">Card Holder</p>
                                            <h6 class="mb-0 text-white">
                                                {{ $default_card->card_name ?? $option_card->card_name }}</h6>
                                        </div>
                                        <div>
                                            <p class="mb-0 text-sm leading-normal text-white opacity-80">Expires</p>
                                            @php
                                                $activeExpiryDate = $default_card ?? $option_card;
                                            @endphp
                                            <h6 class="mb-0 text-white">
                                                {{ \Carbon\Carbon::parse($activeExpiryDate->expiry_date)->format('m/y') }}
                                            </h6>
                                        </div>
                                    </div>
                                    @php
                                        $activeCard = $default_card ?? $option_card;
                                    @endphp
                                    <div class="flex items-end justify-end w-1/5 ml-auto">
                                        @if ($activeCard->type === 'Mastercard')
                                            <img class="w-3/5 mt-2" src="../assets/img/logos/mastercard.png"
                                                alt="logo" />
                                        @elseif ($activeCard->type === 'Visa')
                                            <img class="w-3/5 mt-2" src="../assets/img/logos/visa2.png" alt="logo" />
                                        @elseif ($activeCard->type === 'Discover')
                                            <img class="w-3/5 mt-2" src="../assets/img/logos/discover.png" alt="logo" />
                                        @elseif ($activeCard->type === 'Verve')
                                            <img class="w-3/5 mt-2"src="../assets/img/logos/verve.png" alt="logo" />
                                        @elseif ($activeCard->type === 'American Express')
                                            <img class="w-3/5 mt-2" src="../assets/img/logos/american_express.png"
                                                alt="logo" />
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- end of If virtual card is not null --}}

            <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
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
                    </div>
                    <div class="w-full max-w-full px-3 mt-6 md:mt-0 md:w-1/2 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center shadow-sm icon bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                                    <i
                                        class="relative text-xl leading-none text-white opacity-100 fab fa-paypal top-31/100"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center dark:text-white">Paypal</h6>
                                <span class="text-xs leading-tight dark:text-white dark:opacity-80">Freelance Payment</span>
                                <hr
                                    class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                <h5 class="mb-0 dark:text-white">$455.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-full px-3 mb-6 lg:mb-4 lg:w-full lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0 dark:text-white">Available User Cards</h6>
                            </div>
                            @if ($total_card < 2)
                                <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                    <a class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25"
                                        href="{{ route('create.virtual_card') }}"> <i class="fas fa-plus">
                                        </i>&nbsp;&nbsp;Add
                                        New Card</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            @foreach ($cards as $card)
                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                    <div
                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none md-max:overflow-auto rounded-xl border-slate-100 dark:border-slate-700 bg-clip-border">
                                        @if ($card->type === 'Mastercard')
                                            <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/mastercard.png"
                                                alt="logo" />
                                        @endif
                                        @if ($card->type === 'Visa')
                                            <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/visa2.png"
                                                alt="logo" />
                                        @endif
                                        @if ($card->type === 'Discover')
                                            <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/discover.png"
                                                alt="logo" />
                                        @endif
                                        @if ($card->type === 'Verve')
                                            <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/verve.png"
                                                alt="logo" />
                                        @endif
                                        @if ($card->type === 'American Express')
                                            <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/american_express.png"
                                                alt="logo" />
                                        @endif

                                        {{-- last 4 digits --}}
                                        @php
                                            $last4 = substr($card->card_number, -4);
                                        @endphp
                                        <h6 class="mb-0 dark:text-white">
                                            ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;{{ $last4 }}
                                        </h6>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if ($total_card >= 1)
                <div class="w-full px-3 mb-6 lg:flex-1 xl:mb-0 xl:w-full xl:flex-none">
                    <!-- Card Info & Controls -->
                        <div
                            class="flex flex-col gap-6 rounded-xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-background-dark/50">
                            <div class="space-y-4">
                                <div
                                    class="flex items-center justify-between border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div class="flex items-center justify-center gap-4">
                                        <div
                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                                            <span class="material-symbols-outlined">credit_card</span>
                                        </div>
                                        {{-- last 4 digits --}}
                                        @php
                                            $default_last4 = substr(
                                                $default_card->card_number ?? $option_card->card_number,
                                                -4,
                                            );
                                        @endphp
                                        <p
                                            class="flex-1 truncate text-base font-medium leading-normal text-gray-900 dark:text-gray-100">
                                            ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;{{ $default_last4 }}
                                        </p>
                                    </div>
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800"><span
                                                class="material-symbols-outlined text-xl">visibility</span></button>
                                        <button
                                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800"><span
                                                class="material-symbols-outlined text-xl">content_copy</span></button>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div class="flex items-center justify-center gap-4">
                                        <div
                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                                            <span class="material-symbols-outlined">calendar_month</span>
                                        </div>
                                        <p
                                            class="flex-1 truncate text-base font-medium leading-normal text-gray-900 dark:text-gray-100">
                                            {{ $card?->expiry_date ? \Carbon\Carbon::parse($card->expiry_date)->format('m/y') : \Carbon\Carbon::parse($option_card->expiry_date)->format('m/y') }}

                                        </p>
                                    </div>
                                    <div class="shrink-0">
                                        <button
                                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800"><span
                                                class="material-symbols-outlined text-xl">visibility</span></button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                                            <span class="material-symbols-outlined">password</span>
                                        </div>
                                        <p
                                            class="flex-1 truncate text-base font-medium leading-normal text-gray-900 dark:text-gray-100">
                                            {{ $default_card->card_cvv ?? $option_card->card_cvv }}</p>
                                        {{-- <p
                                        class="flex-1 truncate text-base font-medium leading-normal text-gray-900 dark:text-gray-100">
                                        {{$default_card->card_cvv }}</p> --}}
                                    </div>
                                    <div class="shrink-0">
                                        <button
                                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800"><span
                                                class="material-symbols-outlined text-xl">visibility</span></button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mt-4 flex flex-wrap items-center gap-4 border-t border-gray-200 pt-6 dark:border-gray-700">
                                <button
                                    class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-blue-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 mr-4">
                                    <span class="material-symbols-outlined">ac_unit</span>
                                    <span>Freeze Card</span>
                                </button>
                                <button
                                    class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-red-100 border border-red-200 px-5 py-2.5 text-sm font-semibold text-red-500 hover:bg-red-200 dark:bg-red-600/20 dark:border-red-600 dark:text-red-400 dark:hover:bg-red-600/30"
                                    style="background-color: rgb(240, 221, 221)">
                                    <span class="material-symbols-outlined">delete</span>
                                    <span>Delete Card</span>
                                </button>
                            </div>
                        </div>
                </div>
            @endif
        </div>
    </div>
    <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
        <div
            class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                        <h6 class="mb-0 dark:text-white">Your Transactions</h6>
                    </div>
                    <div class="flex items-center justify-end max-w-full px-3 dark:text-white/80 md:w-1/2 md:flex-none">
                        <i class="mr-2 far fa-calendar-alt"></i>
                        <small>23 - 30 March 2020</small>
                    </div>
                </div>
            </div>
            <div class="flex-auto p-4 pt-6">
                <h6 class="mb-4 text-xs font-bold leading-tight uppercase dark:text-white text-slate-500">Newest</h6>
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                        <div class="flex items-center">
                            <button
                                class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i
                                    class="fas fa-arrow-down text-3xs"></i></button>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Netflix</h6>
                                <span class="text-xs leading-tight dark:text-white/80">27 March 2020, at 12:30
                                    PM</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p
                                class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 bg-clip-text">
                                - $ 2,500</p>
                        </div>
                    </li>
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                        <div class="flex items-center">
                            <button
                                class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                    class="fas fa-arrow-up text-3xs"></i></button>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Apple</h6>
                                <span class="text-xs leading-tight dark:text-white/80">27 March 2020, at 04:30
                                    AM</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p
                                class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                + $ 2,000</p>
                        </div>
                    </li>
                </ul>
                <h6 class="my-4 text-xs font-bold leading-tight uppercase dark:text-white text-slate-500">Yesterday
                </h6>
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                        <div class="flex items-center">
                            <button
                                class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                    class="fas fa-arrow-up text-3xs"></i></button>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Stripe</h6>
                                <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 13:45
                                    PM</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p
                                class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                + $ 750</p>
                        </div>
                    </li>
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 text-inherit rounded-xl">
                        <div class="flex items-center">
                            <button
                                class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                    class="fas fa-arrow-up text-3xs"></i></button>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">HubSpot</h6>
                                <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 12:30
                                    PM</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p
                                class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                + $ 1,000</p>
                        </div>
                    </li>
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 text-inherit rounded-xl">
                        <div class="flex items-center">
                            <button
                                class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                    class="fas fa-arrow-up text-3xs"></i></button>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Creative Tim
                                </h6>
                                <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 08:30
                                    AM</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p
                                class="relative z-10 items-center inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                + $ 2,500</p>
                        </div>
                    </li>
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                        <div class="flex items-center">
                            <button
                                class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-slate-700 border-transparent bg-transparent text-center align-middle font-bold uppercase text-slate-700 transition-all hover:opacity-75"><i
                                    class="fas fa-exclamation text-3xs"></i></button>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Webflow</h6>
                                <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 05:00
                                    AM</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p class="flex items-center m-0 text-sm font-semibold leading-normal text-slate-700">
                                Pending</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
        </div>
        {{-- <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
            <div
                class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                            <h6 class="mb-0 dark:text-white">Your Transactions</h6>
                        </div>
                        <div
                            class="flex items-center justify-end max-w-full px-3 dark:text-white/80 md:w-1/2 md:flex-none">
                            <i class="mr-2 far fa-calendar-alt"></i>
                            <small>23 - 30 March 2020</small>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-4 pt-6">
                    <h6 class="mb-4 text-xs font-bold leading-tight uppercase dark:text-white text-slate-500">Newest</h6>
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                            <div class="flex items-center">
                                <button
                                    class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i
                                        class="fas fa-arrow-down text-3xs"></i></button>
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Netflix</h6>
                                    <span class="text-xs leading-tight dark:text-white/80">27 March 2020, at 12:30
                                        PM</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 bg-clip-text">
                                    - $ 2,500</p>
                            </div>
                        </li>
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                            <div class="flex items-center">
                                <button
                                    class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                        class="fas fa-arrow-up text-3xs"></i></button>
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Apple</h6>
                                    <span class="text-xs leading-tight dark:text-white/80">27 March 2020, at 04:30
                                        AM</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                    + $ 2,000</p>
                            </div>
                        </li>
                    </ul>
                    <h6 class="my-4 text-xs font-bold leading-tight uppercase dark:text-white text-slate-500">Yesterday
                    </h6>
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                            <div class="flex items-center">
                                <button
                                    class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                        class="fas fa-arrow-up text-3xs"></i></button>
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Stripe</h6>
                                    <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 13:45
                                        PM</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                    + $ 750</p>
                            </div>
                        </li>
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 text-inherit rounded-xl">
                            <div class="flex items-center">
                                <button
                                    class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                        class="fas fa-arrow-up text-3xs"></i></button>
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">HubSpot</h6>
                                    <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 12:30
                                        PM</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                    + $ 1,000</p>
                            </div>
                        </li>
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 text-inherit rounded-xl">
                            <div class="flex items-center">
                                <button
                                    class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i
                                        class="fas fa-arrow-up text-3xs"></i></button>
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Creative Tim
                                    </h6>
                                    <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 08:30
                                        AM</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 items-center inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                                    + $ 2,500</p>
                            </div>
                        </li>
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                            <div class="flex items-center">
                                <button
                                    class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-slate-700 border-transparent bg-transparent text-center align-middle font-bold uppercase text-slate-700 transition-all hover:opacity-75"><i
                                        class="fas fa-exclamation text-3xs"></i></button>
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Webflow</h6>
                                    <span class="text-xs leading-tight dark:text-white/80">26 March 2020, at 05:00
                                        AM</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p class="flex items-center m-0 text-sm font-semibold leading-normal text-slate-700">
                                    Pending</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
