@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'bg-rose-50 border border-rose-100 rounded-2xl p-6 shadow-sm']) }}>
        <div class="flex items-center gap-3 mb-3">
            <i class="fas fa-exclamation-circle text-rose-600 text-lg"></i>
            <div class="font-black text-rose-700 text-sm italic uppercase tracking-widest">
                Terjadi Kesalahan
            </div>
        </div>

        <ul class="space-y-2 list-none text-xs font-bold text-rose-600/80">
            @foreach ($errors->all() as $error)
                <li class="flex items-start gap-2">
                    <span class="mt-1.5 h-1 w-1 bg-rose-300 rounded-full shrink-0"></span>
                    <span>{{ $error }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif
