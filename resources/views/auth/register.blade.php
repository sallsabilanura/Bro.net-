<x-guest-layout>
    <div class="max-w-2xl w-full mx-auto px-6">
        <div class="text-center mb-6">
            <a href="/" class="inline-block mb-4">
                <img src="{{ asset('brologo.png') }}" alt="BroNet Logo" class="h-12 w-auto mx-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
            </a>
            <div class="mb-1">
                <span class="bn-subheading !text-[9px]">Bergabung Bersama Kami</span>
            </div>
            <h2 class="bn-heading !text-3xl">Pendaftaran Layanan</h2>
        </div>

        <div class="bn-card !p-6 md:!p-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div class="space-y-1.5">
                    <label for="name" class="bn-subheading !text-[9px]">Nama Lengkap</label>
                    <input id="name" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm transition-all" type="text" name="name" :value="old('name')" required autofocus placeholder="Masukkan nama sesuai KTP" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Email Address -->
                    <div class="space-y-1.5">
                        <label for="email" class="bn-subheading !text-[9px]">Alamat Email</label>
                        <input id="email" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm transition-all" type="email" name="email" :value="old('email')" required placeholder="nama@email.com" />
                    </div>

                    <!-- Phone -->
                    <div class="space-y-1.5">
                        <label for="phone" class="bn-subheading !text-[9px]">Nomor WhatsApp</label>
                        <input id="phone" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm transition-all" type="text" name="phone" :value="old('phone')" required placeholder="0812xxxx" />
                    </div>
                </div>

                <!-- Address -->
                <div class="space-y-1.5">
                    <label for="address" class="bn-subheading !text-[9px]">Alamat Pemasangan</label>
                    <textarea id="address" name="address" rows="2" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm text-slate-700 placeholder-slate-400 transition-all duration-200" required placeholder="Alamat lengkap, blok, nomor rumah...">{{ old('address') }}</textarea>
                </div>

                <!-- Package Selection -->
                <div class="space-y-1.5">
                    <label for="package_type" class="bn-subheading !text-[9px]">Pilih Paket Internet</label>
                    <select id="package_type" name="package_type" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm text-slate-700 transition-all duration-200" required>
                        <option value="Silver">Silver (150rb/bln) - Cocok untuk browsing</option>
                        <option value="Ultra">Ultra (175rb/bln) - Cocok untuk streaming</option>
                        <option value="Extreme">Extreme (200rb/bln) - Cocok untuk gaming/WFH</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Password -->
                    <div class="space-y-1.5">
                        <label for="password" class="bn-subheading !text-[9px]">Password</label>
                        <input id="password" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm transition-all"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" placeholder="••••••••" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-1.5">
                        <label for="password_confirmation" class="bn-subheading !text-[9px]">Ulangi Password</label>
                        <input id="password_confirmation" class="block w-full rounded-xl border-slate-200 focus:border-primary focus:ring focus:ring-primary-light/30 py-3 px-4 text-sm transition-all"
                                        type="password"
                                        name="password_confirmation" required placeholder="••••••••" />
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="bn-btn-primary w-full shadow-lg !py-3 !rounded-xl">
                        <span class="uppercase tracking-widest text-[10px]">Daftar Sekarang</span>
                        <i class="fas fa-user-plus text-[9px] ml-2"></i>
                    </button>
                </div>

                <div class="text-center text-[9px] text-slate-400 font-bold uppercase tracking-widest pt-4 border-t border-slate-50">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-primary hover:underline ml-1">Masuk di sini</a>
                </div>
            </form>
        </div>

        <div class="text-center mt-8">
            <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.4em]">BroNet High Speed Connectivity</p>
        </div>
    </div>
</x-guest-layout>
