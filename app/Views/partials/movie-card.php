<!-- Movie Card Component -->
<div class="group relative overflow-hidden rounded-lg transition duration-300 transform hover:scale-105 hover:shadow-2xl">
    <!-- Card Container -->
    <div class="bg-neutral-900 overflow-hidden rounded-lg border border-white/10">
        <!-- Poster Image -->
        <div class="relative w-full aspect-[2/3] overflow-hidden bg-gradient-to-br from-neutral-800 to-neutral-900">
            <img 
                src="<?= esc($image ?? 'https://placehold.co/300x450/171717/ef4444?text=Catafilm') ?>"
                alt="<?= esc($title ?? 'Movie') ?>"
                class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
            >
            
            <!-- Rank Badge (for Top 10) -->
            <?php if (isset($rank)): ?>
                <div class="absolute top-3 right-3 w-8 h-8 bg-red-600 rounded-full flex items-center justify-center font-bold text-sm shadow-lg">
                    <?= esc((string) $rank) ?>
                </div>
            <?php endif; ?>

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-4">
                <a href="<?= esc($url ?? '#') ?>" class="w-full flex items-center justify-center gap-2 bg-white/20 hover:bg-white/30 text-white py-2 rounded-lg backdrop-blur border border-white/20 transition font-semibold text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    See Details
                </a>
            </div>
        </div>

        <!-- Card Content -->
        <div class="p-4">
            <!-- Title -->
            <h3 class="font-bold text-sm mb-2 line-clamp-2 group-hover:text-white transition">
                <?= esc($title ?? 'Movie Title') ?>
            </h3>

            <!-- Rating and Year -->
            <div class="flex items-center justify-between text-xs text-white/60">
                <div class="flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span><?= esc($rating ?? '8.0') ?></span>
                </div>
                <span><?= esc($year ?? '2026') ?></span>
            </div>

            <!-- Type Badge -->
            <?php if (isset($type)): ?>
                <div class="mt-3 text-xs px-2 py-1 bg-white/10 rounded text-white/70 inline-block">
                    <?= esc($type) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
