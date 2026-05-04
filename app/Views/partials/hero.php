<!-- Hero Section -->
<section class="relative w-full h-screen overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img 
            src="https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?w=1920&h=1080&fit=crop" 
            alt="Featured Movie" 
            class="w-full h-full object-cover"
        >
        <!-- Gradient Overlay (Left to Right) -->
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-transparent"></div>
    </div>

    <!-- Content -->
    <div class="relative h-full flex items-end">
        <div class="w-full max-w-7xl mx-auto px-6 pb-20">
            <div class="max-w-2xl">
                <!-- Title -->
                <h1 class="text-7xl md:text-8xl font-black mb-6 tracking-tight leading-tight text-white">
                    SWAPPED
                </h1>

                <!-- Metadata -->
                <div class="flex items-center gap-4 mb-6">
                    <!-- Rating -->
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-1">
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            <span class="font-semibold">8.3</span>
                        </div>
                    </div>

                    <!-- Year -->
                    <span class="text-white/70">2026</span>

                    <!-- Genres -->
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-white/10 rounded-full text-xs font-500 backdrop-blur">Animation</span>
                        <span class="px-3 py-1 bg-white/10 rounded-full text-xs font-500 backdrop-blur">Adventure</span>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-lg text-white/80 mb-8 max-w-xl leading-relaxed">
                    A tiny woodland creature and a majestic bird suddenly swap bodies, forcing them to team up to survive the wildest adventure of their lives.
                </p>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <!-- <button class="group flex items-center gap-3 bg-white text-black px-8 py-3 rounded-lg font-semibold hover:bg-white/90 transition duration-200">
                        <svg class="w-5 h-5 group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        Play
                    </button> -->
                    <button class="flex items-center gap-3 bg-white/10 hover:bg-white/20 text-white px-8 py-3 rounded-lg font-semibold backdrop-blur transition duration-200 border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        See More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
