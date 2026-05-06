<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Catafilm Admin') ?></title>

    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50:  '#fef2f2',
                            100: '#fee2e2',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                        },
                    },
                    boxShadow: {
                        'soft': '0 1px 2px 0 rgb(0 0 0 / 0.4), 0 1px 3px 0 rgb(0 0 0 / 0.3)',
                        'card': '0 4px 16px -4px rgb(0 0 0 / 0.5)',
                    },
                },
            },
        };
    </script>

    <style>
        html, body { font-family: 'Inter', sans-serif; }
        body { background-color: #09090b; color: #e4e4e7; }
        /* Subtle scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #09090b; }
        ::-webkit-scrollbar-thumb { background: #27272a; border-radius: 6px; }
        ::-webkit-scrollbar-thumb:hover { background: #3f3f46; }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-100 antialiased font-sans"
      x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">
        <?= $this->include('admin/partials/sidebar') ?>

        <!-- Mobile sidebar overlay -->
        <div x-show="sidebarOpen"
             x-transition.opacity
             @click="sidebarOpen = false"
             class="fixed inset-0 z-30 bg-black/60 backdrop-blur-sm lg:hidden"
             style="display: none;"></div>

        <div class="flex-1 flex flex-col min-w-0 lg:pl-64">
            <?= $this->include('admin/partials/navbar') ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <script>
        // Initialize Lucide icons after DOM and after Alpine updates
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) lucide.createIcons();
        });
        document.addEventListener('alpine:initialized', () => {
            if (window.lucide) lucide.createIcons();
        });
    </script>
</body>
</html>
