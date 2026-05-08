<?php
// Data kelompok - bisa disesuaikan dengan nama kelompok Anda
$groupName = $groupName ?? 'KELOMPOK 5';
$members = $members ?? [
    'Anggota 1',
    'Anggota 2',
    'Anggota 3',
    'Anggota 4'
];
$projectTitle = $projectTitle ?? 'CATAFILM';
$subtitle = $subtitle ?? 'Film Catalog Management System';
?>

<!-- Group Introduction Section with Parallax -->
<section id="group-intro" class="relative w-full min-h-screen overflow-hidden flex items-center justify-center py-20 pt-24">

    <!-- Background layers -->
    <div class="absolute inset-0">
        <div class="parallax-bg-1 absolute inset-0 bg-gradient-to-br from-neutral-950 via-black to-neutral-900"></div>

        <div class="parallax-bg-2 absolute inset-0">
            <div class="absolute top-0 left-0 h-full w-1/2 bg-gradient-to-r from-red-950/35 to-transparent"></div>
            <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black to-transparent"></div>
            <div class="absolute top-24 right-16 w-64 h-64 bg-red-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-28 left-12 w-56 h-56 bg-white/5 rounded-full blur-3xl"></div>
        </div>

        <div class="parallax-bg-3 absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-red-500/50 rounded-full animate-pulse"></div>
            <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-white/50 rounded-full animate-pulse delay-1000"></div>
            <div class="absolute bottom-1/3 left-1/2 w-1.5 h-1.5 bg-red-400/40 rounded-full animate-pulse delay-500"></div>
            <div class="absolute bottom-1/4 right-1/4 w-2 h-2 bg-white/30 rounded-full animate-pulse delay-1500"></div>
        </div>

        <div class="absolute inset-0 bg-black/45"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 px-6 max-w-7xl mx-auto w-full">

        <!-- Group Name -->
        <div class="max-w-3xl mx-auto text-center mb-10 animate-fade-in-up">
            <p class="text-sm md:text-base uppercase tracking-[0.24em] text-red-500 font-bold mb-4">
                Praktikum Sistem Multimedia
            </p>
            <h1 class="text-3xl md:text-5xl font-black text-white mb-6 tracking-tight leading-tight">
                <?= esc($groupName) ?>
            </h1>
            <div class="w-20 h-1 bg-red-600 rounded-full mx-auto"></div>
        </div>

        <!-- Project Title -->
        <div class="max-w-2xl mx-auto text-center mb-12 animate-fade-in-up delay-300">
            <h2 class="text-2xl md:text-3xl font-black text-white mb-3 leading-snug">
                <?= esc($projectTitle) ?>
            </h2>
            <p class="text-base md:text-lg text-white/60 font-normal leading-relaxed">
                <?= esc($subtitle) ?>
            </p>
        </div>

        <!-- Members -->
        <div class="animate-fade-in-up delay-500">
            <h2 class="text-3xl font-black mb-8 flex items-center justify-center gap-3">
                <span class="w-1 h-8 bg-red-600 rounded-full"></span>
                Anggota Kelompok
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-5xl mx-auto">
                <?php foreach ($members as $index => $member): ?>
                    <?php
                    $memberName = $member;
                    $memberNpm = '';

                    if (preg_match('/^(.*?)\s*\(([^)]+)\)$/', $member, $matches)) {
                        $memberName = trim($matches[1]);
                        $memberNpm  = trim($matches[2]);
                    }
                    ?>
                    <div class="flex items-center min-h-[5.5rem] bg-neutral-900/80 backdrop-blur border border-white/10 rounded-xl px-5 py-4 hover:bg-white/10 hover:border-red-600/40 transition-all duration-300 animate-fade-in-up"
                        style="animation-delay: <?= 600 + ($index * 80) ?>ms;">

                        <div class="w-10 h-10 min-w-[2.5rem] rounded-full bg-red-600/20 border border-red-600/30 flex items-center justify-center">
                            <span class="text-red-400 font-bold text-sm"><?= esc((string) ($index + 1)) ?></span>
                        </div>

                        <div class="flex-1 flex flex-col items-center justify-center text-center">
                            <p class="text-white font-bold text-lg md:text-xl leading-snug">
                                <?= esc($memberName) ?>
                            </p>
                            <?php if ($memberNpm !== ''): ?>
                                <p class="mt-1 text-red-400/90 font-semibold text-sm md:text-base leading-tight">
                                    <?= esc($memberNpm) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<style>
    /* Parallax animations */
    @keyframes parallax-bg-1 {
        0% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(-50px);
        }
    }

    @keyframes parallax-bg-2 {
        0% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(-100px);
        }
    }

    @keyframes parallax-bg-3 {
        0% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(-150px);
        }
    }

    /* Fade in up animation */
    @keyframes fade-in-up {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }

    .delay-300 {
        animation-delay: 300ms;
    }

    .delay-500 {
        animation-delay: 500ms;
    }

    .delay-700 {
        animation-delay: 700ms;
    }

    .delay-1200 {
        animation-delay: 1200ms;
    }

    /* Parallax effect on scroll */
    .parallax-bg-1 {
        will-change: transform;
    }

    .parallax-bg-2 {
        will-change: transform;
    }

    .parallax-bg-3 {
        will-change: transform;
    }

    /* Hover effects */
    .member-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
</style>

<script>
    // Parallax effect on scroll
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxBg1 = document.querySelector('.parallax-bg-1');
        const parallaxBg2 = document.querySelector('.parallax-bg-2');
        const parallaxBg3 = document.querySelector('.parallax-bg-3');

        if (parallaxBg1) {
            parallaxBg1.style.transform = `translateY(${scrolled * 0.2}px)`;
        }

        if (parallaxBg2) {
            parallaxBg2.style.transform = `translateY(${scrolled * 0.4}px)`;
        }

        if (parallaxBg3) {
            parallaxBg3.style.transform = `translateY(${scrolled * 0.6}px)`;
        }
    });

    // Smooth scroll to next section when clicking scroll indicator
    document.querySelector('.scroll-indicator')?.addEventListener('click', () => {
        const heroSection = document.querySelector('#hero-section');
        if (heroSection) {
            heroSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
</script>