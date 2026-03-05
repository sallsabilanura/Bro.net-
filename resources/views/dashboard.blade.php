<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <span class="bn-subheading">Akses Pelanggan</span>
                <h2 class="bn-heading">Dashboard</h2>
            </div>
            <div class="flex items-center gap-2">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Status: Aktif</span>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
                <!-- Main Identity Card -->
                <div class="md:col-span-8">
                    <div class="bn-card h-full !p-8 relative overflow-hidden group">
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-3">
                                    @if(auth()->user()->status === 'active')
                                        <span class="bn-badge bn-badge-success">Aktif</span>
                                    @elseif(auth()->user()->status === 'pending')
                                        <span class="bn-badge bn-badge-warning">Pending</span>
                                    @else
                                        <span class="bn-badge bn-badge-danger">Non-Aktif</span>
                                    @endif
                                    <span class="text-[9px] font-bold text-slate-300 uppercase tracking-widest border-l border-slate-200 pl-3">Member Premium</span>
                                </div>
                                <div class="text-right">
                                    <p class="bn-subheading !text-[8px] !mb-0">Berlaku Hingga</p>
                                    <p class="text-xs font-black text-slate-800">{{ auth()->user()->active_until ? auth()->user()->active_until->format('d M Y') : '-' }}</p>
                                </div>
                            </div>

                            <div class="mb-6">
                                <p class="bn-subheading !mb-0">ID Pelanggan</p>
                                <h3 class="text-4xl font-black text-slate-900 tracking-tighter">{{ auth()->user()->customer_id ?? '---' }}</h3>
                            </div>

                            <div class="grid grid-cols-2 gap-4 border-t border-slate-50 pt-6 mt-auto">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400">
                                        <i class="fas fa-wifi text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="bn-subheading !text-[8px] !mb-0">Paket</p>
                                        <p class="text-xs font-bold text-slate-700">{{ auth()->user()->package_type ?? 'Pilih Paket' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400">
                                        <i class="fas fa-headset text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="bn-subheading !text-[8px] !mb-0">Support</p>
                                        <p class="text-xs font-bold text-slate-700">Priority 24/7</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <i class="fas fa-signal absolute right-[-20px] bottom-[-20px] text-8xl text-slate-50 group-hover:rotate-6 transition-transform duration-700 opacity-50"></i>
                    </div>
                </div>

                <!-- Action Sidebar -->
                <div class="md:col-span-4 flex flex-col gap-5">
                    <div class="bn-card !bg-slate-900 border-none relative overflow-hidden group !p-6">
                        <div class="relative z-10 flex flex-col h-full">
                            <span class="bn-badge !bg-white/10 !text-white/80 self-start mb-3">Billing Center</span>
                            <h4 class="text-lg font-bold text-white mb-1 leading-tight">Perpanjang Layanan</h4>
                            <p class="text-white/50 text-[10px] mb-6">Pertahankan kecepatan internet Anda tanpa gangguan setiap harinya.</p>
                            
                            @if(auth()->user()->status === 'pending')
                                <button disabled class="w-full py-4 bg-white/5 rounded-xl text-[10px] font-black uppercase text-white/30 cursor-not-allowed border border-white/5">
                                    Menunggu Aktivasi
                                </button>
                            @else
                                <a href="{{ route('subscription.pay') }}" class="bn-btn-primary w-full justify-center !bg-white !text-slate-900 !shadow-none hover:!bg-slate-100">
                                    Bayar Sekarang
                                    <i class="fas fa-arrow-right text-[10px]"></i>
                                </a>
                            @endif
                        </div>
                        <i class="fas fa-bolt absolute right-[-10px] bottom-[-10px] text-6xl text-white/5 rotate-12 group-hover:rotate-0 transition-transform"></i>
                    </div>

                    <a href="{{ route('subscription.show') }}" class="bn-card flex items-center justify-between group hover:border-primary/50">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-primary group-hover:text-white transition-all">
                                <i class="fas fa-receipt text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">Riwayat Bayar</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Detail & Bukti</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-[10px] text-slate-300 group-hover:text-primary transition-all"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
