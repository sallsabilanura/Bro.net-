<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#006D77] leading-tight">
            {{ __('Konfirmasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card-premium overflow-hidden">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="card-premium overflow-hidden">
            <div class="p-10 md:p-14">
                <h3 class="text-4xl font-black text-[#006D77] mb-8 tracking-tight">Konfirmasi Pembayaran</h3>
                
                <div class="mb-10 p-8 bg-[#EDF6F9] rounded-[2rem] border border-[#83C5BE]/20 relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-xs font-black text-[#006D77] uppercase tracking-[0.2em] mb-2">Paket Pilihannya</p>
                        <p class="text-3xl font-black text-gray-900 leading-tight">{{ auth()->user()->package_type }}</p>
                        <p class="text-gray-600 mt-2 font-medium">Harga: <span class="text-[#006D77] font-black italic">Rp {{ number_format(auth()->user()->package_price, 0, ',', '.') }}</span> / bulan</p>
                    </div>
                    <div class="absolute right-[-20px] bottom-[-20px] opacity-10 transform rotate-12 transition-transform duration-700 group-hover:rotate-0">
                        <i class="fas fa-wifi text-9xl text-[#006D77]"></i>
                    </div>
                </div>

                <form action="{{ route('subscription.store-payment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="amount" id="amount_input" value="{{ auth()->user()->package_price }}">
                    
                    <div class="space-y-10">
                        <div>
                            <x-label for="months_count" value="Durasi Berlangganan" class="text-xl font-black text-gray-900 mb-4" />
                            <div class="relative">
                                <x-input id="months_count" class="block w-full text-2xl font-black p-6 rounded-2xl border-gray-100 focus:ring-4 focus:ring-[#006D77]/10" type="number" name="months_count" value="1" min="1" required oninput="calculateTotal()" />
                                <div class="absolute right-6 top-1/2 -translate-y-1/2 text-gray-400 font-bold uppercase tracking-widest text-sm pointer-events-none">Bulan</div>
                            </div>
                            <p class="text-sm text-gray-400 mt-4 font-medium flex items-center gap-2">
                                <i class="fas fa-info-circle text-xs"></i>
                                <span>Pembayaran dapat dilakukan untuk akumulasi beberapa bulan.</span>
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="p-8 bg-gray-50 rounded-[2rem] border border-gray-100 shadow-inner">
                                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Total Transfer</p>
                                <p class="text-3xl font-black text-[#006D77] tracking-tighter" id="total_display">Rp {{ number_format(auth()->user()->package_price, 0, ',', '.') }}</p>
                            </div>
                            <div class="p-8 bg-[#EDF6F9] rounded-[2rem] border border-[#83C5BE]/20 shadow-sm relative">
                                <p class="text-xs font-black text-[#006D77] uppercase tracking-widest mb-2">Berlaku Hingga</p>
                                <p class="text-2xl font-black text-gray-800 tracking-tight" id="date_preview">
                                    @php
                                        $activeUntil = auth()->user()->active_until;
                                        $baseDate = $activeUntil && $activeUntil->isFuture() 
                                            ? $activeUntil 
                                            : now();
                                    @endphp
                                    {{ $baseDate->copy()->addMonth()->format('d M Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="pt-10 border-t border-gray-100">
                            <x-label for="proof" value="Bukti Transfer" class="text-xl font-black text-gray-900 mb-4" />
                            <div class="mt-2 flex items-center justify-center w-full">
                                <label class="flex flex-col w-full h-40 border-4 border-dashed border-gray-100 hover:bg-[#EDF6F9]/30 hover:border-[#83C5BE]/50 transition-all rounded-[2rem] cursor-pointer group">
                                    <div class="flex flex-col items-center justify-center pt-8">
                                        <div class="h-12 w-12 bg-gray-50 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                            <i class="fas fa-cloud-upload-alt text-2xl text-gray-300 group-hover:text-[#006D77]"></i>
                                        </div>
                                        <p class="text-sm font-bold text-gray-400 group-hover:text-[#006D77]">Klik atau seret file ke sini</p>
                                        <p class="text-[10px] font-black text-gray-300 uppercase tracking-widest mt-1">Hanya JPG/PNG (Max 2MB)</p>
                                    </div>
                                    <input type="file" id="proof" name="proof" class="hidden" required onchange="updateFileName(this)" />
                                </label>
                            </div>
                            <div id="file_name_display" class="hidden mt-4 p-3 bg-green-50 text-green-700 text-xs font-bold rounded-xl border border-green-100 items-center gap-2">
                                <i class="fas fa-file-image"></i>
                                <span id="file_name_text"></span>
                            </div>
                        </div>

                        <div class="p-8 bg-[#111827] rounded-[2rem] text-white shadow-2xl shadow-gray-900/40 relative overflow-hidden">
                            <div class="relative z-10">
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Informasi Rekening</p>
                                <div class="flex flex-wrap justify-between items-end gap-6">
                                    <div>
                                        <p class="text-sm font-bold opacity-60 mb-1">Bank Central Asia (BCA)</p>
                                        <p class="text-3xl font-black tracking-tight mb-2">1234 567 890</p>
                                        <p class="text-sm font-bold text-[#83C5BE]">a/n BroNet Indonesia Raya</p>
                                    </div>
                                    <div class="bg-white/10 p-4 rounded-2xl backdrop-blur-md">
                                        <i class="fas fa-university text-3xl text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <x-button class="w-full justify-center py-6 rounded-2xl text-lg font-black shadow-2xl shadow-[#006D77]/20 transition-all duration-300 hover:scale-[1.02]">
                                <i class="fas fa-lock mr-3 opacity-50 text-base"></i>
                                <span>Selesaikan Pembayaran</span>
                            </x-button>
                        </div>
                    </div>

                    <script>
                        function updateFileName(input) {
                            const display = document.getElementById('file_name_display');
                            const text = document.getElementById('file_name_text');
                            if (input.files && input.files[0]) {
                                display.classList.remove('hidden');
                                display.classList.add('flex');
                                text.innerText = 'File terpilih: ' + input.files[0].name;
                            }
                        }

                        function calculateTotal() {
                            const price = {{ auth()->user()->package_price }};
                            const months = parseInt(document.getElementById('months_count').value) || 0;
                            
                            // Update Price display
                            const total = price * months;
                            document.getElementById('total_display').innerText = 'Rp ' + total.toLocaleString('id-ID');
                            document.getElementById('amount_input').value = total;

                            // Update Date preview
                            if (months > 0) {
                                const baseDateStr = "{{ $baseDate->format('Y-m-d') }}";
                                const baseDate = new Date(baseDateStr);
                                
                                baseDate.setMonth(baseDate.getMonth() + months);
                                
                                const options = { day: '2-digit', month: 'short', year: 'numeric' };
                                document.getElementById('date_preview').innerText = baseDate.toLocaleDateString('id-ID', options);
                            } else {
                                document.getElementById('date_preview').innerText = '-';
                            }
                        }
                    </script>
                </form>

                        <script>
                            function calculateTotal() {
                                const price = {{ auth()->user()->package_price }};
                                const months = parseInt(document.getElementById('months_count').value) || 0;
                                
                                // Update Price display
                                const total = price * months;
                                document.getElementById('total_display').innerText = 'Rp ' + total.toLocaleString('id-ID');
                                document.getElementById('amount_input').value = total;

                                // Update Date preview
                                if (months > 0) {
                                    const baseDateStr = "{{ $baseDate->format('Y-m-d') }}";
                                    const baseDate = new Date(baseDateStr);
                                    
                                    baseDate.setMonth(baseDate.getMonth() + months);
                                    
                                    const options = { day: '2-digit', month: 'short', year: 'numeric' };
                                    document.getElementById('date_preview').innerText = baseDate.toLocaleDateString('id-ID', options);
                                } else {
                                    document.getElementById('date_preview').innerText = '-';
                                }
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
