<?php
/**
 * Sidebar partial
 * File: app/Views/admin/partials/sidebar.php
 *
 * Expects (optional): $active = 'dashboard' | 'movies' | 'genres' | ...
 */
$active = $active ?? 'dashboard';
$movieCount = $movieCount ?? 0;

$navItems = [
    ['key' => 'dashboard',  'label' => 'Dashboard',   'icon' => 'layout-dashboard', 'href' => '/admin']
];

?>
<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-zinc-950 border-r border-zinc-900 transform transition-transform duration-200 ease-in-out flex flex-col"
>
    <!-- Brand -->
    <div class="h-16 flex items-left gap-2 px-1 border-b border-zinc-900">
        <!-- Logo -->
        <div class="flex items-center gap-1">
            <a href="<?= base_url() ?>">
                <img src="<?= base_url('uploads/Logo-Transparan.png') ?>" 
                    alt="Catafilm Logo" 
                    class="w-10 h-10 object-contain">
            </a>
            <span class="text-xl font-bold tracking-tight">atafilm</span>
        </div>
    </div>

    <!-- Nav -->
    <nav class="flex-1 overflow-y-auto px-3 py-4">
        <p class="px-3 mb-2 text-[11px] font-medium uppercase tracking-wider text-zinc-500">Main</p>
        <ul class="space-y-1">
            <?php foreach ($navItems as $item): ?>
                <?php $isActive = $active === $item['key']; ?>
                <li>
                    <a href="<?= esc($item['href']) ?>"
                       class="group flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                              <?= $isActive
                                    ? 'bg-zinc-900 text-white'
                                    : 'text-zinc-400 hover:bg-zinc-900/60 hover:text-white' ?>">
                        <i data-lucide="<?= esc($item['icon']) ?>" class="w-4 h-4 <?= $isActive ? 'text-brand-500' : 'text-zinc-500 group-hover:text-zinc-300' ?>"></i>
                        <span><?= esc($item['label']) ?></span>
                        <?php if ($item['key'] === 'movies'): ?>
                            <span class="ml-auto inline-flex items-center justify-center text-[10px] font-semibold px-1.5 py-0.5 rounded-md bg-brand-600/15 text-brand-500 border border-brand-600/20">
                                <?= esc((string) $movieCount) ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    </nav>
</aside>
