<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Group Introduction Section -->
<?= $this->include('partials/group-intro') ?>

<!-- Hero Section -->
<?= $this->include('partials/hero') ?>

<!-- Trending Section -->
<?= $this->include('partials/trending-section') ?>

<!-- Footer Spacing -->
<div class="h-16"></div>

<?= $this->endSection() ?>
