<nav class="bg-black/80 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-1">
            <a href="<?= base_url() ?>">
                <img src="<?= base_url('uploads/Logo-Transparan.png') ?>" 
                    alt="Catafilm Logo" 
                    class="w-10 h-10 object-contain">
            </a>
            <span class="text-xl font-bold tracking-tight">atafilm</span>
        </div>


        <!-- Right Actions -->
        <div class="flex items-center gap-4">
            <!-- Search -->
            <div class="hidden sm:flex items-center bg-white/10 border border-white/20 rounded-lg px-4 py-2 focus-within:border-white/50 transition">
                <svg class="w-4 h-4 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input 
                    type="text" 
                    placeholder="Search films..." 
                    class="bg-transparent ml-3 outline-none text-sm w-32 placeholder-white/40"
                >
            </div>
            <div class="relative" x-data="{ open: false }">
                <button 
                    @click="open = !open"
                    class="flex items-center gap-2 text-white/80 hover:text-white transition text-sm font-500"
                >
                    Categories
                    <svg class="w-4 h-4 transition" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </button>
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    x-transition
                    class="absolute top-full mt-2 w-48 bg-neutral-900 border border-white/10 rounded-lg overflow-hidden shadow-lg"
                >
                    <a href="#" class="block px-4 py-3 hover:bg-white/5 transition text-sm">Movies</a>
                    <a href="#" class="block px-4 py-3 hover:bg-white/5 transition text-sm">TV Shows</a>
                    <a href="#" class="block px-4 py-3 hover:bg-white/5 transition text-sm">Trending</a>
                    <a href="#" class="block px-4 py-3 hover:bg-white/5 transition text-sm">New Releases</a>
                </div>
            </div>

            <!-- Search Icon (Mobile) -->
            <button class="sm:hidden p-2 hover:bg-white/10 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
        </div>
    </div>
</nav>
