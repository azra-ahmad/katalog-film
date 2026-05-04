<!-- Top 10 Today Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-black mb-2 flex items-center gap-3">
                <span class="w-1 h-8 bg-red-600 rounded-full"></span>
                TOP 10 Today
            </h2>
        </div>

        <!-- Horizontal Scroll Container -->
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
            <!-- Scroll Container -->
            <div class="flex gap-6 pb-4">
                <!-- Movie Cards -->
                <?php 
                $topMovies = [
                    ['rank' => 1, 'title' => 'Swapped', 'rating' => '8.3', 'year' => '2026', 'type' => 'Movie'],
                    ['rank' => 2, 'title' => 'The Devil Wears Prada 2', 'rating' => '8.1', 'year' => '2026', 'type' => 'Movie'],
                    ['rank' => 3, 'title' => 'Michael', 'rating' => '7.9', 'year' => '2026', 'type' => 'Movie'],
                    ['rank' => 4, 'title' => 'FROM', 'rating' => '8.2', 'year' => '2023', 'type' => 'TV Show'],
                    ['rank' => 5, 'title' => 'The Boys', 'rating' => '8.4', 'year' => '2019', 'type' => 'TV Show'],
                    ['rank' => 6, 'title' => 'Apex Legends', 'rating' => '8.0', 'year' => '2026', 'type' => 'Movie'],
                    ['rank' => 7, 'title' => 'Man on Fire', 'rating' => '8.0', 'year' => '2024', 'type' => 'Movie'],
                    ['rank' => 8, 'title' => 'Oppenheimer', 'rating' => '8.5', 'year' => '2023', 'type' => 'Movie'],
                    ['rank' => 9, 'title' => 'Barbie', 'rating' => '7.9', 'year' => '2023', 'type' => 'Movie'],
                    ['rank' => 10, 'title' => 'Killers of the Flower Moon', 'rating' => '8.1', 'year' => '2023', 'type' => 'Movie'],
                ];
                
                foreach ($topMovies as $movie): 
                ?>
                    <div class="flex-shrink-0 w-40">
                        <?= $this->include('partials/movie-card', $movie) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
