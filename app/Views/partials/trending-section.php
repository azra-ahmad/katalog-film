<?php
$trendingMovies = $trendingMovies ?? [];
$trendingTitle = $trendingTitle ?? 'Trending Today';
$filters = $filters ?? ['q' => '', 'genre_id' => ''];
?>

<!-- Trending Today Section -->
<section id="trending" class="py-16 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-black flex items-center gap-3">
                    <span class="w-1 h-8 bg-red-600 rounded-full"></span>
                    <?= esc($trendingTitle) ?>
                </h2>
                <?php if (! empty($filters['q']) || ! empty($filters['genre_id'])): ?>
                    <a href="<?= site_url('/') ?>#trending" class="inline-flex mt-3 text-sm text-white/50 hover:text-white transition">
                        Clear filters
                    </a>
                <?php endif; ?>
            </div>

            <div
                x-data="{ activeTab: 'movies' }"
                class="hidden md:flex items-center gap-1 bg-white/5 rounded-lg p-1"
            >
                <button
                    type="button"
                    @click="activeTab = 'movies'"
                    :class="{ 'bg-red-600/20 text-red-400 border border-red-600/30': activeTab === 'movies', 'text-white/70 hover:text-white': activeTab !== 'movies' }"
                    class="px-4 py-2 text-sm font-500 rounded transition"
                >
                    Movies
                </button>
                <button
                    type="button"
                    @click="activeTab = 'series'"
                    :class="{ 'bg-red-600/20 text-red-400 border border-red-600/30': activeTab === 'series', 'text-white/70 hover:text-white': activeTab !== 'series' }"
                    class="px-4 py-2 text-sm font-500 rounded transition"
                >
                    Series
                </button>
            </div>
        </div>

        <?php if (! empty($trendingMovies)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($trendingMovies as $movie): ?>
                    <div>
                        <?= view('partials/movie-card', $movie, ['saveData' => false]) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="rounded-xl border border-white/10 bg-white/5 p-10 text-center">
                <p class="text-white/80 font-semibold">No movies yet</p>
                <p class="text-sm text-white/50 mt-2">Add movies from the admin panel to show them here.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
