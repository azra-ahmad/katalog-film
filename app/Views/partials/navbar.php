<?php
$genres = $genres ?? [];
$currentSearch = $currentSearch ?? '';
$currentGenreId = $currentGenreId ?? '';
?>

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
            <form action="<?= site_url('/') ?>" method="get" class="hidden sm:flex items-center bg-white/10 border border-white/20 rounded-lg px-4 py-2 focus-within:border-white/50 transition">
                <?php if ($currentGenreId !== ''): ?>
                    <input type="hidden" name="genre_id" value="<?= esc($currentGenreId) ?>">
                <?php endif; ?>
                <svg class="w-4 h-4 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input 
                    type="text" 
                    name="q"
                    value="<?= esc($currentSearch) ?>"
                    placeholder="Search films..." 
                    class="bg-transparent ml-3 outline-none text-sm w-32 placeholder-white/40"
                >
            </form>
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
                    <?php if (! empty($genres)): ?>
                        <?php
                        $allMoviesUrl = site_url('/') . ($currentSearch !== '' ? '?' . http_build_query(['q' => $currentSearch]) : '') . '#trending';
                        ?>
                        <a href="<?= esc($allMoviesUrl) ?>" class="block px-4 py-3 hover:bg-white/5 transition text-sm <?= $currentGenreId === '' ? 'text-red-400' : '' ?>">
                            All Movies
                        </a>
                        <?php foreach ($genres as $genre): ?>
                            <?php
                            $categoryUrl = site_url('/') . '?' . http_build_query(array_filter([
                                'q' => $currentSearch,
                                'genre_id' => $genre['id'],
                            ], static fn ($value) => $value !== '' && $value !== null)) . '#trending';
                            ?>
                            <a href="<?= esc($categoryUrl) ?>" class="block px-4 py-3 hover:bg-white/5 transition text-sm <?= (string) $currentGenreId === (string) $genre['id'] ? 'text-red-400' : '' ?>">
                                <?= esc($genre['name']) ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <a href="#trending" class="block px-4 py-3 hover:bg-white/5 transition text-sm">Movies</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Search Icon (Mobile) -->
            <form action="<?= site_url('/') ?>" method="get" class="sm:hidden flex items-center bg-white/10 border border-white/20 rounded-lg px-3 py-2">
                <?php if ($currentGenreId !== ''): ?>
                    <input type="hidden" name="genre_id" value="<?= esc($currentGenreId) ?>">
                <?php endif; ?>
                <input
                    type="text"
                    name="q"
                    value="<?= esc($currentSearch) ?>"
                    placeholder="Search"
                    class="bg-transparent outline-none text-sm w-20 placeholder-white/40"
                >
                <button type="submit" class="ml-2 text-white/70 hover:text-white transition" aria-label="Search">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
