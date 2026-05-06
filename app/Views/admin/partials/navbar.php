<?php
/**
 * Top navbar partial
 * File: app/Views/admin/partials/navbar.php
 *
 * Expects (optional): $pageTitle, $breadcrumb (array of strings)
 */
$pageTitle  = $pageTitle ?? 'Dashboard';
$breadcrumb = $breadcrumb ?? ['Admin', $pageTitle];
?>
<header class="sticky top-0 z-20 bg-zinc-950/80 backdrop-blur border-b border-zinc-900">
    <div class="h-16 px-4 sm:px-6 lg:px-8 flex items-center gap-4">

        <!-- Mobile sidebar toggle -->
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="lg:hidden p-2 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900 transition-colors"
            aria-label="Toggle sidebar">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>

        <!-- Breadcrumb / Title -->
        <div class="hidden sm:flex items-center gap-2 text-sm">
            <?php foreach ($breadcrumb as $i => $crumb): ?>
                <?php if ($i > 0): ?>
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-zinc-600"></i>
                <?php endif; ?>
                <span class="<?= $i === array_key_last($breadcrumb) ? 'text-white font-medium' : 'text-zinc-500' ?>">
                    <?= esc($crumb) ?>
                </span>
            <?php endforeach; ?>
        </div>

        <!-- Search -->
        <div class="ml-auto flex items-center gap-3">
            <div class="hidden md:block relative">
                <i data-lucide="search" class="w-4 h-4 text-zinc-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
                <input
                    type="text"
                    placeholder="Search movies, users..."
                    class="w-64 pl-9 pr-3 py-2 text-sm bg-zinc-900 border border-zinc-800 rounded-lg
                           text-zinc-100 placeholder-zinc-500
                           focus:outline-none focus:ring-2 focus:ring-brand-600/40 focus:border-brand-600 transition" />
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-zinc-500 border border-zinc-800 rounded px-1.5 py-0.5">
                    ⌘K
                </span>
            </div>

            <!-- Notifications -->
            <button class="relative p-2 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900 transition-colors"
                    aria-label="Notifications">
                <i data-lucide="bell" class="w-5 h-5"></i>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-brand-500 rounded-full ring-2 ring-zinc-950"></span>
            </button>

            <!-- Divider -->
            <div class="hidden sm:block w-px h-6 bg-zinc-800"></div>

            <!-- Profile dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button
                    @click="open = !open"
                    @click.outside="open = false"
                    class="flex items-center gap-2 p-1 pr-2 rounded-lg hover:bg-zinc-900 transition-colors"
                    aria-haspopup="true"
                    :aria-expanded="open">
                    <img
                        src="https://i.pravatar.cc/64?img=12"
                        alt="Admin avatar"
                        class="w-8 h-8 rounded-full object-cover ring-2 ring-zinc-800" />
                    <div class="hidden sm:block text-left leading-tight">
                        <p class="text-sm font-medium text-white">Azra Ahmad</p>
                        <p class="text-[11px] text-zinc-500">Super Admin</p>
                    </div>
                    <i data-lucide="chevron-down" class="hidden sm:block w-4 h-4 text-zinc-500"></i>
                </button>

                <!-- Dropdown menu -->
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-56 rounded-xl bg-zinc-900 border border-zinc-800 shadow-card overflow-hidden"
                    style="display: none;">
                    <div class="px-4 py-3 border-b border-zinc-800">
                        <p class="text-sm font-medium text-white">Azra Ahmad</p>
                        <p class="text-xs text-zinc-500 truncate">admin@catafilm.app</p>
                    </div>
                    <ul class="py-1 text-sm">
                        <li>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-zinc-300 hover:bg-zinc-800 hover:text-white transition-colors">
                                <i data-lucide="user" class="w-4 h-4"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-zinc-300 hover:bg-zinc-800 hover:text-white transition-colors">
                                <i data-lucide="settings" class="w-4 h-4"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-zinc-300 hover:bg-zinc-800 hover:text-white transition-colors">
                                <i data-lucide="keyboard" class="w-4 h-4"></i> Shortcuts
                            </a>
                        </li>
                    </ul>
                    <div class="border-t border-zinc-800 py-1">
                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-brand-500 hover:bg-zinc-800 transition-colors">
                            <i data-lucide="log-out" class="w-4 h-4"></i> Sign out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
