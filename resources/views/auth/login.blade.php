<x-guest-layout>
    <div class="max-w-[400px] w-full mx-auto px-6">
        <div class="text-center mb-6">
            <a href="/" class="inline-block mb-4">
                <img src="{{ asset('brologo.png') }}" alt="BroNet Logo" class="h-12 w-auto mx-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
            </a>
            <div class="mb-1">
                <span class="bn-subheading !text-[9px]">Kemitraan Digital BroNet</span>
            </div>
            <h2 class="bn-heading !text-3xl">Pintu Masuk</h2>
        </div>

        <div class="bn-card !p-6 md:!p-8">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div class="space-y-1.5">
                    <label for="email" class="bn-subheading !text-[9px]">Alamat Email</label>
                    <input id="email" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm transition-all" type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="password" class="bn-subheading !text-[9px]">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-[9px] font-black text-primary hover:underline uppercase tracking-wider" href="{{ route('password.request') }}">
                                Lupa?
                            </a>
                        @endif
                    </div>
                    <input id="password" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm transition-all"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    placeholder="••••••••" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-primary shadow-sm focus:border-primary-light focus:ring focus:ring-primary-light/20 h-4 w-4 transition-all" name="remember">
                    <span class="ml-2 text-[10px] text-slate-500 font-bold uppercase tracking-wider cursor-pointer" onclick="document.getElementById('remember_me').click()">Ingat saya</span>
                </div>

                <div class="pt-2">
                    <button type="submit" class="bn-btn-primary w-full !py-3 !rounded-xl shadow-lg">
                        <span class="uppercase tracking-widest text-[10px]">Masuk Sekarang</span>
                        <i class="fas fa-arrow-right text-[9px] ml-2"></i>
                    </button>
                </div>

                <div class="text-center text-[9px] text-slate-400 font-bold uppercase tracking-widest pt-4 border-t border-slate-50">
                    Baru di BroNet? 
                    <a href="{{ route('register') }}" class="text-primary hover:underline ml-1">Buka Akun</a>
                </div>
            </form>
        </div>
        
        <div class="text-center mt-8">
            <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.4em]">Fiber Digital Optimization</p>
        </div>
    </div>
</x-guest-layout>
