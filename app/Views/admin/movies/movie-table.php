<?php
/**
 * Movies CRUD table partial
 * File: app/Views/admin/movies/movie-table.php
 *
 * Wraps the table AND the modals in a single Alpine x-data scope so they share state.
 *
 * Expects (optional): $movies — array of associative arrays, e.g.:
 *   [
 *     'id' => 1, 'title' => 'Swapped', 'genre' => 'Animation, Adventure',
 *     'rating' => 8.3, 'year' => 2026,
 *     'poster' => 'https://...jpg',
 *     'description' => '...'
 *   ]
 */

$movies = $movies ?? [
    [
        'id' => 1, 'title' => 'Swapped', 'genre' => 'Animation, Adventure',
        'rating' => 8.3, 'year' => 2026,
        'poster' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=200&h=300&fit=crop',
        'description' => 'A tiny woodland creature and a majestic bird suddenly swap bodies.'
    ],
    [
        'id' => 2, 'title' => 'Dune: Part Three', 'genre' => 'Sci-Fi, Drama',
        'rating' => 9.1, 'year' => 2026,
        'poster' => 'https://images.unsplash.com/photo-1518929458119-e5bf444c30f4?w=200&h=300&fit=crop',
        'description' => 'The conclusion to the epic saga of Arrakis.'
    ],
    [
        'id' => 3, 'title' => 'Midnight Highway', 'genre' => 'Thriller',
        'rating' => 7.6, 'year' => 2025,
        'poster' => 'https://images.unsplash.com/photo-1440404653325-ab127d49abc1?w=200&h=300&fit=crop',
        'description' => 'A late-night driver picks up the wrong passenger.'
    ],
    [
        'id' => 4, 'title' => 'Neon Tokyo', 'genre' => 'Action, Cyberpunk',
        'rating' => 8.0, 'year' => 2025,
        'poster' => 'https://images.unsplash.com/photo-1542204165-65bf26472b9b?w=200&h=300&fit=crop',
        'description' => 'A hacker uncovers a conspiracy in future Tokyo.'
    ],
    [
        'id' => 5, 'title' => 'The Last Letter', 'genre' => 'Romance, Drama',
        'rating' => 7.9, 'year' => 2024,
        'poster' => 'https://images.unsplash.com/photo-1512070679279-8988d32161be?w=200&h=300&fit=crop',
        'description' => 'A forgotten letter rekindles an old flame.'
    ],
    [
        'id' => 6, 'title' => 'Echoes of Mars', 'genre' => 'Sci-Fi',
        'rating' => 8.5, 'year' => 2026,
        'poster' => 'https://images.unsplash.com/photo-1419242902214-272b3f66ee7a?w=200&h=300&fit=crop',
        'description' => 'The first colonists discover they are not alone.'
    ],
    [
        'id' => 7, 'title' => 'Paper Crowns', 'genre' => 'Comedy',
        'rating' => 7.2, 'year' => 2025,
        'poster' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=200&h=300&fit=crop',
        'description' => 'Three friends accidentally start a fake monarchy.'
    ],
];
?>

<section
    x-data="moviesCrud()"
    x-init="init()"
    class="rounded-2xl bg-zinc-900/40 border border-zinc-800 shadow-card overflow-hidden"
>
    <!-- Toolbar -->
    <div class="p-5 border-b border-zinc-800 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-lg font-semibold text-white tracking-tight">Movies</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Manage your film catalog — <?= count($movies) ?> entries</p>
        </div>
        <div class="flex items-center gap-2">
            <div class="relative">
                <i data-lucide="search" class="w-4 h-4 text-zinc-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
                <input
                    type="text"
                    placeholder="Filter movies..."
                    class="w-full sm:w-56 pl-9 pr-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                           text-zinc-100 placeholder-zinc-500
                           focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
            </div>
            <button
                @click="openAdd()"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg
                       bg-brand-600 hover:bg-brand-700 text-white shadow-soft transition-colors">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span class="hidden sm:inline">Add Movie</span>
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-xs uppercase tracking-wider text-zinc-500 border-b border-zinc-800 bg-zinc-950/50">
                    <th class="px-5 py-3 font-medium">Poster</th>
                    <th class="px-5 py-3 font-medium">Title</th>
                    <th class="px-5 py-3 font-medium">Genre</th>
                    <th class="px-5 py-3 font-medium">Rating</th>
                    <th class="px-5 py-3 font-medium">Year</th>
                    <th class="px-5 py-3 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-800">
                <?php foreach ($movies as $movie): ?>
                    <tr class="group hover:bg-zinc-900/60 transition-colors">
                        <!-- Poster -->
                        <td class="px-5 py-3">
                            <div class="w-12 h-16 rounded-md overflow-hidden bg-zinc-800 ring-1 ring-zinc-800">
                                <img
                                    src="<?= esc($movie['poster']) ?>"
                                    alt="<?= esc($movie['title']) ?> poster"
                                    class="w-full h-full object-cover"
                                    onerror="this.src='https://placehold.co/48x64/27272a/ef4444?text=%E2%97%89'" />
                            </div>
                        </td>

                        <!-- Title -->
                        <td class="px-5 py-3">
                            <p class="font-medium text-white"><?= esc($movie['title']) ?></p>
                            <p class="text-xs text-zinc-500 mt-0.5 line-clamp-1 max-w-xs">
                                <?= esc($movie['description']) ?>
                            </p>
                        </td>

                        <!-- Genre -->
                        <td class="px-5 py-3">
                            <div class="flex flex-wrap gap-1">
                                <?php foreach (explode(',', $movie['genre']) as $g): ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs
                                                 bg-zinc-800 text-zinc-300 border border-zinc-700/60">
                                        <?= esc(trim($g)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </td>

                        <!-- Rating -->
                        <td class="px-5 py-3">
                            <span class="inline-flex items-center gap-1 text-zinc-200 font-medium">
                                <i data-lucide="star" class="w-3.5 h-3.5 text-amber-400 fill-amber-400"></i>
                                <?= esc(number_format((float)$movie['rating'], 1)) ?>
                            </span>
                        </td>

                        <!-- Year -->
                        <td class="px-5 py-3 text-zinc-300"><?= esc($movie['year']) ?></td>

                        <!-- Actions -->
                        <td class="px-5 py-3">
                            <div class="flex items-center justify-end gap-1">
                                <button
                                    @click='openEdit(<?= json_encode($movie, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'
                                    class="p-2 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors"
                                    title="Edit">
                                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                                </button>
                                <button
                                    @click='openDelete(<?= json_encode(['id' => $movie['id'], 'title' => $movie['title']], JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'
                                    class="p-2 rounded-lg text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 transition-colors"
                                    title="Delete">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($movies)): ?>
                    <tr>
                        <td colspan="6" class="px-5 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-zinc-800 flex items-center justify-center">
                                    <i data-lucide="film" class="w-5 h-5 text-zinc-500"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white">No movies yet</p>
                                    <p class="text-xs text-zinc-500 mt-0.5">Add your first movie to get started.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer / Pagination -->
    <div class="p-4 border-t border-zinc-800 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs text-zinc-500">
        <p>Showing <span class="text-zinc-300 font-medium">1</span>–<span class="text-zinc-300 font-medium"><?= count($movies) ?></span> of <span class="text-zinc-300 font-medium">128</span> movies</p>
        <div class="flex items-center gap-1">
            <button class="px-3 py-1.5 rounded-md border border-zinc-800 text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">Previous</button>
            <button class="px-3 py-1.5 rounded-md bg-zinc-800 text-white">1</button>
            <button class="px-3 py-1.5 rounded-md text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">2</button>
            <button class="px-3 py-1.5 rounded-md text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">3</button>
            <button class="px-3 py-1.5 rounded-md border border-zinc-800 text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">Next</button>
        </div>
    </div>

    <!-- Include modals inside the same Alpine scope -->
    <?= $this->include('admin/movies/modal-form') ?>
</section>

<script>
    function moviesCrud() {
        return {
            // Modal visibility
            showAdd: false,
            showEdit: false,
            showDelete: false,

            // Working forms
            blankForm: {
                id: null, title: '', genre: '', rating: '', year: '',
                poster: '', description: ''
            },
            form: { id: null, title: '', genre: '', rating: '', year: '', poster: '', description: '' },
            target: { id: null, title: '' },

            init() {
                // Re-render Lucide icons whenever a modal opens
                this.$watch('showAdd',    v => v && this.$nextTick(() => window.lucide && lucide.createIcons()));
                this.$watch('showEdit',   v => v && this.$nextTick(() => window.lucide && lucide.createIcons()));
                this.$watch('showDelete', v => v && this.$nextTick(() => window.lucide && lucide.createIcons()));
            },

            openAdd() {
                this.form = { ...this.blankForm };
                this.showAdd = true;
            },
            openEdit(movie) {
                this.form = {
                    id: movie.id,
                    title: movie.title || '',
                    genre: movie.genre || '',
                    rating: movie.rating || '',
                    year: movie.year || '',
                    poster: movie.poster || '',
                    description: movie.description || '',
                };
                this.showEdit = true;
            },
            openDelete(movie) {
                this.target = { id: movie.id, title: movie.title };
                this.showDelete = true;
            },

            // Placeholder submit handlers (no backend wired)
            submitAdd() {
                console.log('[v0] Add movie payload', this.form);
                this.showAdd = false;
            },
            submitEdit() {
                console.log('[v0] Edit movie payload', this.form);
                this.showEdit = false;
            },
            confirmDelete() {
                console.log('[v0] Delete movie id', this.target.id);
                this.showDelete = false;
            },
        }
    }
</script>
