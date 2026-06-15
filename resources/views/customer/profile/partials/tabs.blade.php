<div class="grid gap-4 lg:grid-cols-3">
    @foreach($profile['tabs'] as $tab)
        <button
            type="button"
            @click="activePanel = '{{ $tab['id'] }}'"
            :class="activePanel === '{{ $tab['id'] }}' ? 'border-[#173121] bg-[#173121] text-white shadow-[0_20px_60px_rgba(23,49,33,0.20)]' : 'border-white/70 bg-white text-[#173121] shadow-[0_20px_60px_rgba(0,0,0,0.08)]'"
            class="rounded-2xl border p-5 text-left transition hover:-translate-y-0.5 hover:shadow-[0_24px_70px_rgba(0,0,0,0.12)]"
        >
            <div class="flex items-center gap-3">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full {{ $tab['iconClass'] }}">
                    <i class="{{ $tab['icon'] }}"></i>
                </span>
                <p class="text-xs font-bold uppercase tracking-widest">{{ $tab['label'] }}</p>
            </div>
        </button>
    @endforeach
</div>
