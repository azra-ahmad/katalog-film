<?php
$sectionTitle = $sectionTitle ?? 'TOP 10 Today';
$topMovies = $sectionMovies ?? $topMovies ?? [];
?>

<!-- Top 10 Today Section -->
<section id="top-10" class="py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-8">
            <h2 class="text-3xl font-black mb-2 flex items-center gap-3">
                <span class="w-1 h-8 bg-red-600 rounded-full"></span>
                <?= esc($sectionTitle) ?>
            </h2>
        </div>

        <?php if (! empty($topMovies)): ?>
            <div
                class="overflow-x-auto scroll-smooth"
                x-data="{
                    scrollLeft: false,
                    scrollRight: true,
                    checkScroll(e) {
                        this.scrollLeft = e.target.scrollLeft > 0;
                        this.scrollRight = e.target.scrollLeft < e.target.scrollWidth - e.target.clientWidth - 10;
                    }
                }"
                @scroll="checkScroll($event)"
            >
                <div class="flex gap-6 pb-4">
                    <?php foreach ($topMovies as $movie): ?>
                        <div class="flex-shrink-0 w-40">
                            <?= view('partials/movie-card', $movie) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="rounded-xl border border-white/10 bg-white/5 p-10 text-center">
                <p class="text-white/80 font-semibold"><?= esc($sectionTitle) ?> is empty</p>
                <p class="text-sm text-white/50 mt-2">Movies with ratings will appear here.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
