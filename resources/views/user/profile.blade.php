@extends('layouts.app')

@section('content')
    <!-- Profile Header -->
    <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0" style="margin: auto;">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex justify-between p-6">
                <h5 class="dark:text-white underline" style="color: rgb(48, 48, 190)">{{ $user->first_name }} Profile</h5>
                <a href="{{ route('edit.profile') }}">
                    <i class="fa-solid fa-user-pen fa-xl" style="color: #0559eb;"></i>
                </a>
            </div>
            {{-- <img class="w-full block md:hidden rounded-t-2xl" src="../assets/img/bg-profile.jpg" alt="profile cover image"> --}}
            <div class="flex flex-wrap justify-center -mx-3 mt-6">
                <div class="w-4/12 max-w-full px-3 flex-0">
                    <div class="relative mx-auto -mt-16 w-32 h-32 ">
                        <!-- Profile Image -->
                        @if ($user->profile_photo === null)
                            <img id="previewImage" class="w-full h-full object-cover rounded-full border-2 border-white"
                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5NiIgaGVpZ2h0PSI5NiIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSJyZ2IoOTQgMTE0IDIyOCIgZD0iTTEyIDJDNi40OCAyIDIgNi40OCAyIDEyczQuNDggMTAgMTAgMTBzMTAtNC40OCAxMC0xMFMxNy41MiAyIDEyIDJtMCA0YzEuOTMgMCAzLjUgMS41NyAzLjUgMy41UzEzLjkzIDEzIDEyIDEzcy0zLjUtMS41Ny0zLjUtMy41UzEwLjA3IDYgMTIgNm0wIDE0Yy0yLjAzIDAtNC40My0uODItNi4xNC0yLjg4YTkuOTUgOS45NSAwIDAgMSAxMi4yOCAwQzE2LjQzIDE5LjE4IDE0LjAzIDIwIDEyIDIwIi8+PC9zdmc+"
                                alt="profile image">
                        @else
                            <img id="previewImage" class="w-full h-full object-cover rounded-full border-2 border-white"
                                src="{{ $user->profile_photo }}" alt="profile image">
                        @endif
                    </div>
                </div>
            </div>
            {{-- End Upload Profile Picture --}}
            <div class="flex items-center justify-center px-6 pt-0">
                <div class="mt-6 mb-6 text-center">
                    <h4 class="dark:text-white" style="color: rgb(48, 48, 190)">
                        {{ $user->first_name }} {{ $user->last_name }}
                        {{-- <span class="font-light">, 35</span> --}}
                    </h4>
                    <div
                        class="flex w-full items-center justify-between mt-4 mb-4 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                        <i class="mr-2 fa-solid fa-bag-shopping"></i>
                        <p class="m-0 font-semibold">{{ $user->accounts->account_type }}</p>
                    </div>
                    <div
                        class="flex w-full items-center justify-between mb-4 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                        <i class="mr-2 fa-solid fa-calendar"></i>
                        <p class="m-0 font-semibold">{{ $user->dob }}</p>
                    </div>
                    <div
                        class="flex w-full items-center justify-between mb-4 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                        <i class="mr-2 dark:text-white ni ni-pin-3"></i>
                        <p class="m-0 font-semibold">{{ $user->city }}, {{ $user->country }}</p>
                    </div>
                    <div
                        class="flex w-full mb-6 items-center justify-between font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                        <i class="mr-2 dark:text-white ni ni-mobile-button"></i>
                        <p class="m-0 font-semibold">{{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
