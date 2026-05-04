<!-- Trending Today Section -->
<section class="py-16 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header with Tabs -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-black flex items-center gap-3">
                    <span class="w-1 h-8 bg-red-600 rounded-full"></span>
                    Trending Today
                </h2>
            </div>

            <!-- Tabs -->
            <div 
                x-data="{ activeTab: 'movies' }" 
                class="hidden md:flex items-center gap-1 bg-white/5 rounded-lg p-1"
            >
                <button 
                    @click="activeTab = 'movies'"
                    :class="{ 'bg-red-600/20 text-red-400 border border-red-600/30': activeTab === 'movies', 'text-white/70 hover:text-white': activeTab !== 'movies' }"
                    class="px-4 py-2 text-sm font-500 rounded transition"
                >
                    Movies
                </button>
                <button 
                    @click="activeTab = 'series'"
                    :class="{ 'bg-red-600/20 text-red-400 border border-red-600/30': activeTab === 'series', 'text-white/70 hover:text-white': activeTab !== 'series' }"
                    class="px-4 py-2 text-sm font-500 rounded transition"
                >
                    Series
                </button>
            </div>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php 
            $trendingMovies = [
                ['title' => 'The Devil Wears Prada 2', 'rating' => '8.1', 'year' => '2026', 'type' => 'Movie'],
                ['title' => 'Michael', 'rating' => '7.9', 'year' => '2026', 'type' => 'Movie'],
                ['title' => 'Apex Legends', 'rating' => '8.0', 'year' => '2026', 'type' => 'Movie'],
                ['title' => 'The Boys You Kill You', 'rating' => '8.6', 'year' => '2024', 'type' => 'TV Show'],
                ['title' => 'Oppenheimer', 'rating' => '8.5', 'year' => '2023', 'type' => 'Movie'],
                ['title' => 'Barbie', 'rating' => '7.9', 'year' => '2023', 'type' => 'Movie'],
                ['title' => 'Killers of the Flower Moon', 'rating' => '8.1', 'year' => '2023', 'type' => 'Movie'],
                ['title' => 'Dune', 'rating' => '8.0', 'year' => '2021', 'type' => 'Movie'],
            ];
            
            foreach ($trendingMovies as $movie): 
            ?>
                <div>
                    <?= $this->include('partials/movie-card', $movie) ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button -->
        <div class="mt-12 text-center">
            <button class="px-8 py-3 bg-white/10 hover:bg-white/20 text-white rounded-lg font-semibold transition border border-white/20">
                View All Trending
            </button>
        </div>
    </div>
</section>
