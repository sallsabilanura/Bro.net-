<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <span class="bn-subheading">Riwayat Transaksi</span>
                <h2 class="bn-heading">Tagihan</h2>
            </div>
            <a href="{{ route('subscription.pay') }}" class="bn-btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Pembayaran</span>
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5">
                <!-- Top Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="bn-card md:col-span-2 flex flex-col justify-center">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="bn-subheading mb-1">ID Pelanggan</p>
                                <h3 class="text-4xl font-black text-slate-900 tracking-tight">{{ $user->customer_id ?? 'PENDING' }}</h3>
                            </div>
                            <div class="text-right">
                                <p class="bn-subheading mb-1 text-right">Status Akun</p>
                                @if($user->status === 'active')
                                    <span class="bn-badge bn-badge-success">Aktif</span>
                                @elseif($user->status === 'pending')
                                    <span class="bn-badge bn-badge-warning">Pending</span>
                                @else
                                    <span class="bn-badge bn-badge-danger">Non-Aktif</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="bn-card bg-slate-50 border-dashed border-slate-300 flex flex-col justify-center text-center">
                        <p class="bn-subheading mb-1">Berlaku Hingga</p>
                        <p class="text-xl font-black text-primary">{{ $user->active_until ? $user->active_until->format('d M Y') : 'Menunggu Aktivasi' }}</p>
                    </div>
                </div>

                <!-- History Table Area -->
                <div class="bn-card !p-0 overflow-hidden shadow-sm">
                    <div class="bg-white px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-black text-slate-900">Daftar Pembayaran</h4>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Semua transaksi terverifikasi & pending</p>
                        </div>
                    </div>
                    
                    <div class="bn-table-container !border-none !rounded-none">
                        <table class="bn-table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Paket / Detail</th>
                                    <th class="text-right">Nominal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>
                                            <p class="font-bold text-slate-900">{{ $payment->created_at->format('d M Y') }}</p>
                                            <p class="text-[10px] text-slate-400 font-medium">{{ $payment->created_at->format('H:i') }} WIB</p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                                                    <i class="fas fa-wifi text-[10px]"></i>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-800 tracking-tight">{{ $user->package_type }}</p>
                                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">{{ $payment->months_count }} Bulan Masa Aktif</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <p class="text-base font-black text-slate-900">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                                        </td>
                                        <td class="text-center">
                                            @if($payment->status === 'approved')
                                                <span class="bn-badge bn-badge-success !text-[8px]">Verified</span>
                                            @elseif($payment->status === 'rejected')
                                                <span class="bn-badge bn-badge-danger !text-[8px]">Rejected</span>
                                            @else
                                                <span class="bn-badge bn-badge-warning !text-[8px] animate-pulse">Checking</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($payment->proof)
                                                <a href="{{ Storage::url($payment->proof) }}" target="_blank" class="inline-flex items-center justify-center w-8 h-8 bg-white border border-slate-200 rounded-lg text-slate-400 hover:text-primary hover:border-primary transition-all shadow-sm">
                                                    <i class="fas fa-file-image text-[10px]"></i>
                                                </a>
                                            @else
                                                <span class="text-[10px] text-slate-300 italic font-bold">---</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-24 text-center">
                                            <div class="flex flex-col items-center opacity-20">
                                                <i class="fas fa-folder-open text-5xl mb-4"></i>
                                                <p class="text-xs font-black uppercase tracking-[0.3em]">Belum Ada Riwayat Transaksi</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Summary Footer -->
                <div class="flex justify-center py-8">
                    <p class="text-[11px] font-medium text-slate-400 bg-slate-100/50 px-4 py-1.5 rounded-full">
                        Menampilkan semua riwayat pembayaran atas nama <strong>{{ $user->name }}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
