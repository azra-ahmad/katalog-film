<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$movie = $movie ?? [];
$sectionTitle = $sectionTitle ?? 'You May Like';
$sectionMovies = $sectionMovies ?? [];
?>

<section class="relative min-h-[82vh] overflow-hidden">
    <div class="absolute inset-0">
        <img
            src="<?= esc($movie['image'] ?? 'https://placehold.co/1920x1080/171717/ef4444?text=Catafilm') ?>"
            alt="<?= esc($movie['title'] ?? 'Movie detail') ?>"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-black/20"></div>
        <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black to-transparent"></div>
    </div>

    <div class="relative min-h-[82vh] flex items-end">
        <div class="w-full max-w-7xl mx-auto px-6 pb-16">
            <a href="<?= site_url('/') ?>" class="inline-flex items-center gap-2 text-sm text-white/70 hover:text-white mb-8 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to catalog
            </a>

            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tight leading-tight">
                    <?= esc(strtoupper($movie['title'] ?? 'MOVIE')) ?>
                </h1>

                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <div class="flex items-center gap-1">
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="font-semibold"><?= esc($movie['rating'] ?? '0.0') ?></span>
                    </div>
                    <span class="text-white/70"><?= esc($movie['year'] ?? '-') ?></span>
                    <span class="px-3 py-1 bg-white/10 rounded-full text-xs font-500 backdrop-blur">
                        <?= esc($movie['genre'] ?? 'Movie') ?>
                    </span>
                </div>

                <p class="text-lg text-white/80 max-w-2xl leading-relaxed">
                    <?= esc($movie['synopsis'] ?: 'No synopsis available yet.') ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-10 items-start">
            <div class="rounded-xl overflow-hidden bg-neutral-900 border border-white/10 shadow-2xl">
                <img
                    src="<?= esc($movie['image'] ?? 'https://placehold.co/600x900/171717/ef4444?text=Catafilm') ?>"
                    alt="<?= esc($movie['title'] ?? 'Movie poster') ?>"
                    class="w-full aspect-[2/3] object-cover"
                >
            </div>

            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-black mb-4 flex items-center gap-3">
                        <span class="w-1 h-8 bg-red-600 rounded-full"></span>
                        Synopsis
                    </h2>
                    <p class="text-white/70 leading-8 max-w-4xl">
                        <?= esc($movie['synopsis'] ?: 'No synopsis available yet.') ?>
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="rounded-xl border border-white/10 bg-white/5 p-5">
                        <p class="text-xs uppercase tracking-widest text-white/40 mb-2">Director</p>
                        <p class="font-semibold"><?= esc($movie['director'] ?? '-') ?></p>
                    </div>
                    <div class="rounded-xl border border-white/10 bg-white/5 p-5">
                        <p class="text-xs uppercase tracking-widest text-white/40 mb-2">Genre</p>
                        <p class="font-semibold"><?= esc($movie['genre'] ?? '-') ?></p>
                    </div>
                    <div class="rounded-xl border border-white/10 bg-white/5 p-5">
                        <p class="text-xs uppercase tracking-widest text-white/40 mb-2">Actors</p>
                        <p class="font-semibold leading-7"><?= esc($movie['actors'] ?? '-') ?></p>
                    </div>
                    <div class="rounded-xl border border-white/10 bg-white/5 p-5">
                        <p class="text-xs uppercase tracking-widest text-white/40 mb-2">Release & Rating</p>
                        <p class="font-semibold"><?= esc($movie['year'] ?? '-') ?> - <?= esc($movie['rating'] ?? '0.0') ?>/10</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= view('partials/top-10-section', [
    'sectionTitle' => $sectionTitle,
    'sectionMovies' => $sectionMovies,
]) ?>

<div class="h-16"></div>

<?= $this->endSection() ?>
