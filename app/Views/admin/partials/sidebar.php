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
    ['key' => 'dashboard',  'label' => 'Dashboard',   'icon' => 'layout-dashboard', 'href' => '/admin'],
    ['key' => 'movies',     'label' => 'Movies',      'icon' => 'film',             'href' => '/admin/movies'],
    ['key' => 'genres',     'label' => 'Genres',      'icon' => 'tag',              'href' => '/admin/genres'],
    ['key' => 'reviews',    'label' => 'Reviews',     'icon' => 'message-square',   'href' => '/admin/reviews'],
    ['key' => 'users',      'label' => 'Users',       'icon' => 'users',            'href' => '/admin/users'],
    ['key' => 'analytics',  'label' => 'Analytics',   'icon' => 'bar-chart-3',      'href' => '/admin/analytics'],
];

$settingsItems = [
    ['key' => 'settings', 'label' => 'Settings', 'icon' => 'settings', 'href' => '/admin/settings'],
    ['key' => 'help',     'label' => 'Help',     'icon' => 'life-buoy', 'href' => '/admin/help'],
];
?>
<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-zinc-950 border-r border-zinc-900 transform transition-transform duration-200 ease-in-out flex flex-col"
>
    <!-- Brand -->
    <div class="h-16 flex items-center gap-2 px-6 border-b border-zinc-900">
        <div class="w-8 h-8 rounded-lg bg-brand-600 flex items-center justify-center shadow-soft">
            <i data-lucide="film" class="w-5 h-5 text-white"></i>
        </div>
        <div class="flex flex-col leading-tight">
            <span class="text-base font-semibold text-white tracking-tight">Catafilm</span>
            <span class="text-[10px] uppercase tracking-widest text-zinc-500">Admin Panel</span>
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

        <p class="px-3 mt-6 mb-2 text-[11px] font-medium uppercase tracking-wider text-zinc-500">Account</p>
        <ul class="space-y-1">
            <?php foreach ($settingsItems as $item): ?>
                <?php $isActive = $active === $item['key']; ?>
                <li>
                    <a href="<?= esc($item['href']) ?>"
                       class="group flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                              <?= $isActive
                                    ? 'bg-zinc-900 text-white'
                                    : 'text-zinc-400 hover:bg-zinc-900/60 hover:text-white' ?>">
                        <i data-lucide="<?= esc($item['icon']) ?>" class="w-4 h-4 <?= $isActive ? 'text-brand-500' : 'text-zinc-500 group-hover:text-zinc-300' ?>"></i>
                        <span><?= esc($item['label']) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <!-- Footer card -->
    <div class="p-3 border-t border-zinc-900">
        <div class="rounded-xl bg-zinc-900/60 border border-zinc-800 p-4 shadow-soft">
            <div class="flex items-center gap-2 mb-2">
                <i data-lucide="sparkles" class="w-4 h-4 text-brand-500"></i>
                <span class="text-sm font-semibold text-white">Upgrade to Pro</span>
            </div>
            <p class="text-xs text-zinc-400 leading-relaxed mb-3">
                Unlock advanced analytics and unlimited movie uploads.
            </p>
            <button class="w-full text-xs font-medium px-3 py-2 rounded-lg bg-brand-600 hover:bg-brand-700 text-white transition-colors">
                Upgrade now
            </button>
        </div>
    </div>
</aside>
