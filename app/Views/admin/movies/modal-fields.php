<?php $genres = $genres ?? []; ?>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
    <div class="sm:col-span-2">
        <label class="block text-xs font-medium text-zinc-400 mb-1.5">Title</label>
        <input type="text" name="title" x-model="form.title" required placeholder="e.g. Interstellar"
               class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                      text-white placeholder-zinc-500
                      focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
    </div>

    <div>
        <label class="block text-xs font-medium text-zinc-400 mb-1.5">Genre</label>
        <select name="genre_id" x-model="form.genre_id" required
                class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                       text-white focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition">
            <option value="">Choose genre</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?= esc($genre['id']) ?>"><?= esc($genre['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block text-xs font-medium text-zinc-400 mb-1.5">Director</label>
        <input type="text" name="director" x-model="form.director" required placeholder="Christopher Nolan"
               class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                      text-white placeholder-zinc-500
                      focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
    </div>

    <div class="sm:col-span-2">
        <label class="block text-xs font-medium text-zinc-400 mb-1.5">Actors</label>
        <input type="text" name="actors" x-model="form.actors" required placeholder="Actor one, actor two"
               class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                      text-white placeholder-zinc-500
                      focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
    </div>

    <div>
        <label class="block text-xs font-medium text-zinc-400 mb-1.5">Year</label>
        <input type="number" name="year" x-model="form.year" min="1900" max="2099" required placeholder="2026"
               class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                      text-white placeholder-zinc-500
                      focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
    </div>

    <div>
        <label class="block text-xs font-medium text-zinc-400 mb-1.5">Rating</label>
        <input type="number" name="rating" x-model="form.rating" step="0.1" min="0" max="9.9" required placeholder="8.3"
               class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                      text-white placeholder-zinc-500
                      focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
    </div>

    <div class="sm:col-span-2">
        <label class="block text-xs font-medium text-zinc-400 mb-1.5">Synopsis</label>
        <textarea name="synopsis" x-model="form.synopsis" rows="3" placeholder="Short synopsis..."
                  class="w-full px-3 py-2 text-sm bg-zinc-950 border border-zinc-800 rounded-lg
                         text-white placeholder-zinc-500
                         focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition resize-none"></textarea>
    </div>
</div>
