<?php
$movies = $movies ?? [];
$genres = $genres ?? [];
$errors = session('errors') ?? [];
$initialModal = session('modal') ?? null;
$editMovieId = session('editMovieId') ?? null;
$crudConfig = [
    'initialModal' => $initialModal,
    'editMovieId' => $editMovieId,
    'oldInput' => [
        'title' => old('title'),
        'genre_id' => old('genre_id'),
        'director' => old('director'),
        'actors' => old('actors'),
        'year' => old('year'),
        'rating' => old('rating'),
        'synopsis' => old('synopsis'),
    ],
    'movies' => $movies,
];
?>

<section
    x-data='moviesCrud(<?= json_encode($crudConfig, JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_QUOT) ?>)'
    x-init="init()"
    class="rounded-2xl bg-zinc-900/40 border border-zinc-800 shadow-card overflow-hidden"
>
    <div class="p-5 border-b border-zinc-800 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-lg font-semibold text-white tracking-tight">Movies</h2>
            <p class="text-xs text-zinc-500 mt-0.5">Manage your film catalog - <?= count($movies) ?> entries</p>
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
                type="button"
                @click="openAdd()"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg
                       bg-brand-600 hover:bg-brand-700 text-white shadow-soft transition-colors">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span class="hidden sm:inline">Add Movie</span>
            </button>
        </div>
    </div>

    <?php if (! empty($errors)): ?>
        <div class="mx-5 mt-5 rounded-xl border border-rose-500/20 bg-rose-500/10 px-4 py-3">
            <p class="text-sm font-medium text-rose-300">Please fix the form errors.</p>
            <ul class="mt-2 space-y-1 text-xs text-rose-200">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

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
                        <td class="px-5 py-3">
                            <div class="w-12 h-16 rounded-md overflow-hidden bg-zinc-800 ring-1 ring-zinc-800">
                                <img
                                    src="<?= esc($movie['poster_url']) ?>"
                                    alt="<?= esc($movie['title']) ?> poster"
                                    class="w-full h-full object-cover"
                                    onerror="this.src='https://placehold.co/48x64/27272a/ef4444?text=No'" />
                            </div>
                        </td>
                        <td class="px-5 py-3">
                            <p class="font-medium text-white"><?= esc($movie['title']) ?></p>
                            <p class="text-xs text-zinc-500 mt-0.5 line-clamp-1 max-w-xs">
                                <?= esc($movie['director']) ?> - <?= esc($movie['actors']) ?>
                            </p>
                        </td>
                        <td class="px-5 py-3">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs
                                         bg-zinc-800 text-zinc-300 border border-zinc-700/60">
                                <?= esc($movie['genre']) ?>
                            </span>
                        </td>
                        <td class="px-5 py-3">
                            <span class="inline-flex items-center gap-1 text-zinc-200 font-medium">
                                <i data-lucide="star" class="w-3.5 h-3.5 text-amber-400 fill-amber-400"></i>
                                <?= esc(number_format((float) $movie['rating'], 1)) ?>
                            </span>
                        </td>
                        <td class="px-5 py-3 text-zinc-300"><?= esc($movie['year']) ?></td>
                        <td class="px-5 py-3">
                            <div class="flex items-center justify-end gap-1">
                                <button
                                    type="button"
                                    @click='openEdit(<?= json_encode($movie, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'
                                    class="p-2 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors"
                                    title="Edit">
                                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                                </button>
                                <button
                                    type="button"
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

    <div class="p-4 border-t border-zinc-800 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs text-zinc-500">
        <p>Showing <span class="text-zinc-300 font-medium"><?= count($movies) ?></span> of <span class="text-zinc-300 font-medium"><?= count($movies) ?></span> movies</p>
    </div>

    <?= $this->include('admin/movies/modal-form') ?>
</section>

<script>
    function moviesCrud(config) {
        return {
            showAdd: false,
            showEdit: false,
            showDelete: false,
            movies: config.movies || [],
            blankForm: {
                id: null,
                title: '',
                genre_id: '',
                director: '',
                actors: '',
                year: '',
                rating: '',
                synopsis: '',
                poster_url: ''
            },
            form: {},
            target: { id: null, title: '' },

            init() {
                this.form = { ...this.blankForm };
                this.$watch('showAdd', v => v && this.$nextTick(() => window.lucide && lucide.createIcons()));
                this.$watch('showEdit', v => v && this.$nextTick(() => window.lucide && lucide.createIcons()));
                this.$watch('showDelete', v => v && this.$nextTick(() => window.lucide && lucide.createIcons()));

                if (config.initialModal === 'add') {
                    this.form = { ...this.blankForm, ...this.cleanOldInput(config.oldInput || {}) };
                    this.showAdd = true;
                }

                if (config.initialModal === 'edit' && config.editMovieId) {
                    const movie = this.movies.find(item => String(item.id) === String(config.editMovieId));
                    if (movie) {
                        this.openEdit({ ...movie, ...this.cleanOldInput(config.oldInput || {}) });
                    }
                }
            },

            cleanOldInput(input) {
                return Object.fromEntries(Object.entries(input).filter(([, value]) => value !== null));
            },

            openAdd() {
                this.form = { ...this.blankForm };
                this.showAdd = true;
            },

            openEdit(movie) {
                this.form = {
                    id: movie.id,
                    title: movie.title || '',
                    genre_id: movie.genre_id || '',
                    director: movie.director || '',
                    actors: movie.actors || '',
                    year: movie.year || '',
                    rating: movie.rating || '',
                    synopsis: movie.synopsis || '',
                    poster_url: movie.poster_url || ''
                };
                this.showEdit = true;
            },

            openDelete(movie) {
                this.target = { id: movie.id, title: movie.title };
                this.showDelete = true;
            }
        }
    }
</script>
