<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<?= $this->include('partials/hero') ?>

<!-- Top 10 Section -->
<?= $this->include('partials/top-10-section') ?>

<!-- Trending Section -->
<?= $this->include('partials/trending-section') ?>

<!-- Footer Spacing -->
<div class="h-16"></div>

<?= $this->endSection() ?>
