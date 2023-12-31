<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

{{-- <!DOCTYPE html>
<html lang="en">

<head>
   @include('frontend.pertials.css-link')
</head>

<body class="font-display">
    
     <!-- Sign In Form Start -->
    <div class="container py-20">

        <div class="sign_in ">
            <h2 class="text-center text-gray-black xl:text-[32px] text-[20px] font-semibold font-display">User Sign In</h2>
            <div class="form">
                <form action="{{ route('login') }} class="">
                    @csrf
                    <div class="mb-4">
                        <input type="email" name="email" :value="old('email')" placeholder="Email" class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                    </div>

                    <div class="relative">
                        <input type="password" placeholder="Password" class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" id="myInput" name="password">
                        <span class="absolute top-[17px] right-5 cursor-pointer ">
                            <svg id="icon-show" onclick="PasswordIcon()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg class="mt-[10px]" id="icon-hide" onclick="PasswordIcon()" width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="cursor-pointer inline-flex items-center">
                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" class="cursor-pointer" type="checkbox" value="yes">
                            <label for="wp-comment-cookies-consent">Remember me</label>
                        </div>
                        <a href="forget-password.html" class="text-dark-accents text-[14px] font-medium line-height-[110%]">Forget
                            Password</a>
                    </div>
                    <button class="form_btn w-full">
                        Sign In
                        <span>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 7.5L20.5 12M20.5 12L16 16.5M20.5 12H4.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </span>
                    </button>

                </form>
                <div class="font-display font-normal text-[14px] leading-[110%] text-gray-black mt-6 text-center">Don’t
                    have account? <a href="sign-up.html" class="text-dark-accents font-display font-medium text-[14px] leading-[110%]"> Sign Up</a></div>
            </div>
        </div>
    </div>
    <!-- Sign In Form End -->
    @include('frontend.pertials.script')
</body>

</html> --}}

