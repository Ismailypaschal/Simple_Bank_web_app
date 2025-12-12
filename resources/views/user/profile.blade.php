@extends('layouts.app')
@section('content')
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80 font-bold">Edit Profile</p>
                            <button type="button"
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Settings</button>
                        </div>
                        @if (session('success'))
                            <div class="mb-4 p-3 bg-green-100 text-green-500 rounded-lg text-center"
                                style="color: rgb(40, 192, 40)">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-lg text-center"
                                style="color: rgb(192, 39, 39)">
                                {{ session('error') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded text-center" style="color: red">
                                <ul class="text-sm text-red-600 list-disc pl-5">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="flex-auto p-6">
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm font-bold">User
                            Information</p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="account_no"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Account
                                        Number</label>
                                    <input type="text" name="account_no" value="{{ $user->accounts->account_number }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        readonly />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="account_type"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Account
                                        Type
                                    </label>
                                    <input type="text" name="account_type" value="{{ $user->accounts->account_type }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        readonly />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="email"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email
                                        address</label>
                                    <input type="email" name="email" value="{{ $user->email }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        readonly />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="dob"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Date
                                        Of Birth</label>
                                    <input type="text" name="dob" value="{{ $user->dob }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        readonly />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="occupation"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Occupation</label>
                                    <input type="text" name="occupation" value="{{ $user->occupation }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        readonly />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="phone"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Phone
                                        Number
                                    </label>
                                    <input type="tel" name="phone" value="{{ $user->phone }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        readonly />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="gender"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Gender</label>
                                    <input type="text" name="gender" value="{{ $user->gender }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="marital_status"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Marital
                                        Status</label>
                                    <input type="text" name="marital_status" value="{{ $user->marital_status }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm font-bold">Contact
                            Information</p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                <div class="mb-4">
                                    <label for="address"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Address</label>
                                    <input type="text" name="address" value="{{ $user->address }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="city"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">City</label>
                                    <input type="text" name="city" value="{{ $user->city }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="country"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Country</label>
                                    <input type="text" name="country" value="{{ $user->country }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="postal code"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Postal
                                        code</label>
                                    <input type="text" name="postal_code" value="{{ $user->postal_code }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    {{-- Upload Profile Picture --}}
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <img class="w-full rounded-t-2xl" src="../assets/img/bg-profile.jpg" alt="profile cover image">
                        <div class="flex flex-wrap justify-center -mx-3">
                            <div class="w-4/12 max-w-full px-3 flex-0">
                                <div class="relative mx-auto -mt-16 w-32 h-32 mb-6">
                                    <!-- Profile Image -->
                                    <img id="previewImage"
                                        class="w-full h-full object-cover rounded-full border-2 border-white"
                                        src="../assets/img/team-2.jpg" alt="profile image">

                                    <!-- Hover Overlay -->
                                    <label for="photoInput"
                                        class="absolute inset-0 flex items-center justify-center bg-black/50 text-white text-sm font-bold rounded-full opacity-0 hover:opacity-100 cursor-pointer transition">
                                        Upload Photo
                                    </label>

                                    <!-- Hidden File Input -->
                                    <input type="file" name="profile_photo" id="photoInput" class="hidden"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                            <p class="text-blue-500 mx-auto font-bold">Upload Picture</p>
                            <button type="submit"
                                class="mx-auto px-8 py-2 font-bold text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-600">
                                Save
                            </button>
                        </div>
                    </form>
                    {{-- End Upload Profile Picture --}}
                    <div class="flex-auto p-6 pt-0">
                        <div class="mt-6 text-center">
                            <h5 class="dark:text-white ">
                                {{ $user->first_name }} {{ $user->last_name }}
                                {{-- <span class="font-light">, 35</span> --}}
                            </h5>
                            <div class="mb-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                <i class="mr-2 dark:text-white ni ni-pin-3"></i>
                                {{ $user->city }}, {{ $user->country }}
                            </div>
                            <div
                                class="mt-6 mb-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                <i class="mr-2 dark:text-white ni ni-briefcase-24"></i>
                                {{ $user->occupation }}
                            </div>
                            <div class="dark:text-white/80 font-semibold">
                                <i class="mr-2 dark:text-white ni ni-mobile-button"></i>
                                {{ $user->phone }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Password and Pin Change --}}
            <div class="flex flex-wrap w-full mt-4">
                <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-6">
                            <p class="leading-normal uppercase font-bold dark:text-white dark:opacity-60 text-sm">Change
                                Password</p>
                            <form method="POST" action="{{ route('update.password') }}">
                                @csrf
                                <div class="mx-3">
                                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                        <div class="mb-4">
                                            <label for="old_password"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Old
                                                Password</label>
                                            <input type="password" name="old_password" placeholder="Old Password"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            @error('old_password')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                        <div class="mb-4">
                                            <label for="password"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">New
                                                Password
                                            </label>
                                            <input type="password" name="password" placeholder="New Password"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            @error('password')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                        <div class="mb-4">
                                            <label for="password"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Confirm
                                                Password
                                            </label>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm Password"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            @error('password_confirmation')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="w-1/2 mx-4 mt-4 block text-sm bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-800">
                                        Change Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="mt-4 h-4 md:mt-0 md-h-0"></div> --}}
                <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-6">
                            <p class="leading-normal uppercase font-bold dark:text-white dark:opacity-60 text-sm">Change
                                Pin</p>
                            <form method="POST" action="">
                                @csrf
                                <div class="mx-3">
                                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                        <div class="mb-4">
                                            <label for="old_password"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Current
                                                Pin</label>
                                            <input type="password" name="old_pin" placeholder="Current Pin"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        </div>
                                    </div>
                                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                        <div class="mb-4">
                                            <label for="password"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">New
                                                Pin
                                            </label>
                                            <input type="password" name="pin" placeholder="New Pin"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        </div>
                                    </div>
                                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                        <div class="mb-4">
                                            <label for="password"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Confirm
                                                Pin
                                            </label>
                                            <input type="password" name="confirm_pin" placeholder="Confirm Pin"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="w-1/2 mx-4 mt-4 block bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-800">
                                        Change Pin
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End Password and Pin Change --}}
            </div>
        </div>
    </div>
@endsection
