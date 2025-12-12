<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Enter Security Code</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2a7aea",
                        "background-light": "#f6f7f8",
                        "background-dark": "#111821",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display antialiased max-h-screen">
    <div
        class="relative flex h-full min-h-screen w-full flex-col overflow-hidden max-w-md mx-auto shadow-2xl bg-background-light dark:bg-background-dark">
        <!-- TopAppBar -->
        <div class="flex items-center p-4 justify-between z-10">
            <div class="flex items-center mx-auto">
                <span class="material-symbols-outlined text-green-600" style="font-size: 20px;">lock</span>
                <h2 class="text-slate-900 dark:text-white text-sm font-bold uppercase tracking-wider">Secure Banking
                </h2>
            </div>
            {{-- <div class="size-12"></div> <!-- Spacer for alignment --> --}}
        </div>
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col items-center pt-2 px-6">
            <!-- Hero Icon (Replaces HeaderImage for this context) -->
            <div class="mb-4 relative">
                <div
                    class="size-20 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-2 mx-auto animate-pulse">
                    <span class="material-symbols-outlined text-primary" style="font-size: 40px;">security</span>
                </div>
            </div>
            <!-- HeadlineText -->
            {{-- <h2 class="text-slate-900 dark:text-white text-[28px] font-bold leading-tight text-center mb-2">Security
                Verification</h2> --}}
            <!-- BodyText -->
            <p
                class="text-slate-500 dark:text-slate-400 text-base font-normal leading-normal text-center mb-8 max-w-[280px]">
                Enter the 4-digit code to authorize the transfer.
            </p>
            <!-- ConfirmationCode -->
            <div class="flex justify-center w-full mb-4">
                <fieldset class="flex gap-4 justify-center">
                    <!-- 4 Inputs as requested in design plan -->
                    <input
                        class="flex h-12 w-10 text-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-2xl font-bold text-slate-900 dark:text-white shadow-sm caret-primary transition-all duration-200"
                        inputmode="numeric" maxlength="1" type="text" value="2" />
                    <input
                        class="flex h-12 w-10 text-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-2xl font-bold text-slate-900 dark:text-white shadow-sm caret-primary transition-all duration-200"
                        inputmode="numeric" maxlength="1" placeholder="●" type="text" value="" />
                    <input
                        class="flex h-12 w-10 text-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-2xl font-bold text-slate-900 dark:text-white shadow-sm caret-primary transition-all duration-200"
                        inputmode="numeric" maxlength="1" type="text" value="" />
                    <input
                        class="flex h-12 w-10 text-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-2xl font-bold text-slate-900 dark:text-white shadow-sm caret-primary transition-all duration-200"
                        inputmode="numeric" maxlength="1" type="text" value="" />
                </fieldset>
            </div>
        </div>
        <!-- Custom Numeric Keypad -->
        <div class="pb-8 pt-4 px-6 bg-background-light dark:bg-background-dark">
            <div class="grid grid-cols-3 gap-x-4 gap-y-2 max-w-[320px] mx-auto">
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">1</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">2</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">3</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">4</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">5</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">6</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">7</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">8</button>
                <button
                    class="h-16 w-full rounded-full text-lg font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">9</button>
                <!-- Biometric -->
                <button
                    class="h-16 w-full rounded-full flex items-center justify-center text-primary hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 32px;">send</span>
                    {{-- <span class="material-symbols-outlined" style="font-size: 32px;">face</span> --}}
                </button>
                <!-- Zero -->
                <button
                    class="h-16 w-full rounded-full text-2xl font-medium text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors flex items-center justify-center">0</button>
                <!-- Backspace -->
                <button
                    class="h-16 w-full rounded-full flex items-center justify-center text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 28px;">backspace</span>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
