<?php
/**
 * Movie modal forms partial
 * File: app/Views/admin/movies/modal-form.php
 *
 * Contains three modals: Add, Edit, and Delete.
 * Must be included INSIDE the moviesCrud() Alpine scope (see movie-table.php),
 * so it can access showAdd / showEdit / showDelete / form / target.
 */
?>

<!-- =========================================================
     Reusable form fields macro (rendered twice: Add & Edit)
     ========================================================= -->
<template x-teleport="body">
    <div>

        <!-- ============== ADD MOVIE MODAL ============== -->
        <div
            x-show="showAdd"
            x-transition.opacity
            @keydown.escape.window="showAdd = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display: none;"
            role="dialog"
            aria-modal="true"
            aria-labelledby="addMovieTitle"
        >
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" @click="showAdd = false"></div>

            <div
                x-show="showAdd"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative w-full max-w-lg rounded-2xl bg-zinc-900 border border-zinc-800 shadow-card overflow-hidden"
            >
                <!-- Header -->
                <div class="flex items-start justify-between p-5 border-b border-zinc-800">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-brand-600/15 border border-brand-600/20 flex items-center justify-center">
                            <i data-lucide="plus" class="w-4 h-4 text-brand-500"></i>
                        </div>
                        <div>
                            <h3 id="addMovieTitle" class="text-base font-semibold text-white">Add new movie</h3>
                            <p class="text-xs text-zinc-500 mt-0.5">Fill in the details below to add a movie to your catalog.</p>
                        </div>
                    </div>
                    <button @click="showAdd = false"
                            class="p-1 rounded-md text-zinc-500 hover:text-white hover:bg-zinc-800 transition-colors"
                            aria-label="Close">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>

                <!-- Body -->
                <form @submit.prevent="submitAdd()">
                    <div class="p-5 space-y-4 max-h-[65vh] overflow-y-auto">
                        <div>
                            <label class="block text-xs font-medium text-zinc-400 mb-1.5">Title</label>
                            <input type="text" x-model="form.title" required placeholder="e.g. Swapped"
                                   class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                          text-white placeholder-zinc-500
                                          focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-zinc-400 mb-1.5">Year</label>
                                <input type="number" x-model="form.year" min="1900" max="2099" placeholder="2026"
                                       class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                              text-white placeholder-zinc-500
                                              focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-zinc-400 mb-1.5">Rating</label>
                                <input type="number" x-model="form.rating" step="0.1" min="0" max="10" placeholder="8.3"
                                       class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                              text-white placeholder-zinc-500
                                              focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-zinc-400 mb-1.5">Genre</label>
                            <input type="text" x-model="form.genre" placeholder="Animation, Adventure"
                                   class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                          text-white placeholder-zinc-500
                                          focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                            <p class="text-[11px] text-zinc-500 mt-1">Separate multiple genres with commas.</p>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-zinc-400 mb-1.5">Poster URL</label>
                            <input type="url" x-model="form.poster" placeholder="https://..."
                                   class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                          text-white placeholder-zinc-500
                                          focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-zinc-400 mb-1.5">Description</label>
                            <textarea x-model="form.description" rows="3" placeholder="Short synopsis..."
                                      class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                             text-white placeholder-zinc-500
                                             focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition resize-none"></textarea>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="flex items-center justify-end gap-2 p-4 bg-zinc-950/50 border-t border-zinc-800">
                        <button type="button" @click="showAdd = false"
                                class="px-3 py-2 text-sm font-medium rounded-lg
                                       text-zinc-300 hover:text-white hover:bg-zinc-800 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg
                                       bg-brand-600 hover:bg-brand-700 text-white shadow-soft transition-colors">
                            <i data-lucide="check" class="w-4 h-4"></i>
                            Save movie
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ============== EDIT MOVIE MODAL ============== -->
        <div
            x-show="showEdit"
            x-transition.opacity
            @keydown.escape.window="showEdit = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display: none;"
            role="dialog"
            aria-modal="true"
            aria-labelledby="editMovieTitle"
        >
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" @click="showEdit = false"></div>

            <div
                x-show="showEdit"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative w-full max-w-lg rounded-2xl bg-zinc-900 border border-zinc-800 shadow-card overflow-hidden"
            >
                <div class="flex items-start justify-between p-5 border-b border-zinc-800">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-amber-500/10 border border-amber-500/20 flex items-center justify-center">
                            <i data-lucide="square-pen" class="w-4 h-4 text-amber-400"></i>
                        </div>
                        <div>
                            <h3 id="editMovieTitle" class="text-base font-semibold text-white">Edit movie</h3>
                            <p class="text-xs text-zinc-500 mt-0.5">Update the details for <span class="text-zinc-300 font-medium" x-text="form.title || '...'"></span>.</p>
                        </div>
                    </div>
                    <button @click="showEdit = false"
                            class="p-1 rounded-md text-zinc-500 hover:text-white hover:bg-zinc-800 transition-colors"
                            aria-label="Close">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>

                <form @submit.prevent="submitEdit()">
                    <div class="p-5 space-y-4 max-h-[65vh] overflow-y-auto">
                        <!-- Poster preview -->
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-20 rounded-md overflow-hidden bg-zinc-800 ring-1 ring-zinc-800 flex-shrink-0">
                                <img :src="form.poster || 'https://placehold.co/56x80/27272a/ef4444?text=%E2%97%89'"
                                     alt="poster preview" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <label class="block text-xs font-medium text-zinc-400 mb-1.5">Poster URL</label>
                                <input type="url" x-model="form.poster" placeholder="https://..."
                                       class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                              text-white placeholder-zinc-500
                                              focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-zinc-400 mb-1.5">Title</label>
                            <input type="text" x-model="form.title" required
                                   class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                          text-white placeholder-zinc-500
                                          focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-zinc-400 mb-1.5">Year</label>
                                <input type="number" x-model="form.year" min="1900" max="2099"
                                       class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                              text-white placeholder-zinc-500
                                              focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-zinc-400 mb-1.5">Rating</label>
                                <input type="number" x-model="form.rating" step="0.1" min="0" max="10"
                                       class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                              text-white placeholder-zinc-500
                                              focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-zinc-400 mb-1.5">Genre</label>
                            <input type="text" x-model="form.genre"
                                   class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                          text-white placeholder-zinc-500
                                          focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-zinc-400 mb-1.5">Description</label>
                            <textarea x-model="form.description" rows="3"
                                      class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                                             text-white placeholder-zinc-500
                                             focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition resize-none"></textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-2 p-4 bg-zinc-950/50 border-t border-zinc-800">
                        <button type="button" @click="showEdit = false"
                                class="px-3 py-2 text-sm font-medium rounded-lg
                                       text-zinc-300 hover:text-white hover:bg-zinc-800 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg
                                       bg-brand-600 hover:bg-brand-700 text-white shadow-soft transition-colors">
                            <i data-lucide="save" class="w-4 h-4"></i>
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ============== DELETE CONFIRM MODAL ============== -->
        <div
            x-show="showDelete"
            x-transition.opacity
            @keydown.escape.window="showDelete = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display: none;"
            role="alertdialog"
            aria-modal="true"
            aria-labelledby="deleteMovieTitle"
        >
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" @click="showDelete = false"></div>

            <div
                x-show="showDelete"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative w-full max-w-md rounded-2xl bg-zinc-900 border border-zinc-800 shadow-card overflow-hidden"
            >
                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-rose-500/10 border border-rose-500/20 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="triangle-alert" class="w-5 h-5 text-rose-400"></i>
                        </div>
                        <div>
                            <h3 id="deleteMovieTitle" class="text-base font-semibold text-white">Delete movie</h3>
                            <p class="text-sm text-zinc-400 mt-1 leading-relaxed">
                                Are you sure you want to delete
                                <span class="text-white font-medium" x-text="`'${target.title}'`"></span>?
                                This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 p-4 bg-zinc-950/50 border-t border-zinc-800">
                    <button type="button" @click="showDelete = false"
                            class="px-3 py-2 text-sm font-medium rounded-lg
                                   text-zinc-300 hover:text-white hover:bg-zinc-800 transition-colors">
                        Cancel
                    </button>
                    <button type="button" @click="confirmDelete()"
                            class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg
                                   bg-rose-600 hover:bg-rose-700 text-white shadow-soft transition-colors">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>
