<div class="flex flex-col items-center">
    <div class="mb-8 transform transition-all duration-500 hover:scale-105">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md px-10 py-12 bg-white/80 backdrop-blur-sm shadow-[0_20px_50px_rgba(0,109,119,0.1)] overflow-hidden sm:rounded-3xl border border-white/20">
        {{ $slot }}
    </div>
</div>
