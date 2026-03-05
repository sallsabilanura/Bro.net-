<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-[#006D77] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:bg-[#005F66] hover:shadow-md active:bg-[#004D54] focus:outline-none focus:border-[#004D54] focus:ring ring-[#83C5BE] disabled:opacity-25 transition-all duration-200']) }}>
    {{ $slot }}
</button>
