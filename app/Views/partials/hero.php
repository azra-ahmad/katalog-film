<?php
$featuredMovie = $featuredMovie ?? null;
$fallbackImage = 'https://placehold.co/1920x1080/171717/ef4444?text=Catafilm';
?>

<!-- Hero Section -->
<section class="relative w-full h-screen overflow-hidden">
    <div class="absolute inset-0">
        <img
            src="<?= esc($featuredMovie['image'] ?? $fallbackImage) ?>"
            alt="<?= esc($featuredMovie['title'] ?? 'Featured Movie') ?>"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/60 to-transparent"></div>
        <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black to-transparent"></div>
    </div>

    <div class="relative h-full flex items-end">
        <div class="w-full max-w-7xl mx-auto px-6 pb-20">
            <div class="max-w-2xl">
                <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tight leading-tight text-white">
                    <?= esc(strtoupper($featuredMovie['title'] ?? 'CATAFILM')) ?>
                </h1>

                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <div class="flex items-center gap-1">
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="font-semibold"><?= esc($featuredMovie['rating'] ?? '0.0') ?></span>
                    </div>

                    <span class="text-white/70"><?= esc($featuredMovie['year'] ?? date('Y')) ?></span>

                    <?php if (! empty($featuredMovie['genre'])): ?>
                        <span class="px-3 py-1 bg-white/10 rounded-full text-xs font-500 backdrop-blur">
                            <?= esc($featuredMovie['genre']) ?>
                        </span>
                    <?php endif; ?>
                </div>

                <p class="text-lg text-white/80 mb-8 max-w-xl leading-relaxed">
                    <?= esc($featuredMovie['synopsis'] ?? 'Explore the latest movies from the Catafilm catalog.') ?>
                </p>

                <div class="flex items-center gap-4">
                    <a href="<?= esc($featuredMovie['url'] ?? '#trending') ?>"
                       class="flex items-center gap-3 bg-white/10 hover:bg-white/20 text-white px-8 py-3 rounded-lg font-semibold backdrop-blur transition duration-200 border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        See Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
