<?php
/**
 * Dashboard page
 * File: app/Views/admin/dashboard.php
 *
 * Render via:
 *   return view('admin/dashboard', [
 *       'title'     => 'Dashboard | Catafilm Admin',
 *       'pageTitle' => 'Dashboard',
 *       'active'    => 'dashboard',
 *   ]);
 */
?>
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Page header -->
<div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-semibold text-white tracking-tight">Welcome back, Azra</h1>
        <p class="text-sm text-zinc-400 mt-1">Here's what's happening with your film catalog today.</p>
    </div>
</div>

<!-- Stat cards -->
<?php $stats = $stats ?? []; ?>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <?php foreach ($stats as $stat): ?>
        <div class="rounded-2xl bg-zinc-900/60 border border-zinc-800 p-5 shadow-soft hover:border-zinc-700 transition-colors">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm text-zinc-400"><?= esc($stat['label']) ?></span>
                <div class="w-9 h-9 rounded-lg bg-zinc-800/80 flex items-center justify-center">
                    <i data-lucide="<?= esc($stat['icon']) ?>" class="w-4 h-4 text-brand-500"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-semibold text-white tracking-tight"><?= esc($stat['value']) ?></span>
                <span class="text-xs font-medium <?= $stat['positive'] ? 'text-emerald-400' : 'text-rose-400' ?>">
                    <?= esc($stat['delta']) ?>
                </span>
            </div>
            <p class="text-xs text-zinc-500 mt-1"><?= esc($stat['note']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php if (session('success')): ?>
    <div class="mb-5 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
        <?= esc(session('success')) ?>
    </div>
<?php endif; ?>

<?php if (session('error')): ?>
    <div class="mb-5 rounded-xl border border-rose-500/20 bg-rose-500/10 px-4 py-3 text-sm text-rose-300">
        <?= esc(session('error')) ?>
    </div>
<?php endif; ?>

<!-- Movies CRUD section (table + modals share one Alpine scope) -->
<?= $this->include('admin/movies/movie-table') ?>

<?= $this->endSection() ?>
