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
    <div class="flex items-center gap-2">
        <button class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg
                       bg-zinc-900 border border-zinc-800 text-zinc-300 hover:text-white hover:bg-zinc-800 transition-colors">
            <i data-lucide="download" class="w-4 h-4"></i>
            Export
        </button>
        <a href="/admin/movies"
           class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg
                  bg-brand-600 hover:bg-brand-700 text-white shadow-soft transition-colors">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Add Movie
        </a>
    </div>
</div>

<!-- Stat cards -->
<?php
$stats = [
    [
        'label' => 'Total Movies',
        'value' => '128',
        'delta' => '+12.4%',
        'positive' => true,
        'icon'  => 'film',
        'note'  => 'vs last month',
    ],
    [
        'label' => 'Total Views',
        'value' => '2.4M',
        'delta' => '+8.1%',
        'positive' => true,
        'icon'  => 'eye',
        'note'  => 'vs last month',
    ],
    [
        'label' => 'Active Users',
        'value' => '14,328',
        'delta' => '+3.2%',
        'positive' => true,
        'icon'  => 'users',
        'note'  => 'vs last month',
    ],
    [
        'label' => 'Avg. Rating',
        'value' => '8.4',
        'delta' => '-0.2',
        'positive' => false,
        'icon'  => 'star',
        'note'  => 'vs last month',
    ],
];
?>
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

<!-- Movies CRUD section (table + modals share one Alpine scope) -->
<?= $this->include('admin/movies/movie-table') ?>

<?= $this->endSection() ?>
