<?php
/**
 * Base layout using Bulma CSS with a modern, feminine theme.
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#f7a8c6" />
    <title><?= $this->renderSection('title') ?: 'Bulma CRUD • CodeIgniter 4' ?></title>
  <link rel="icon" href="<?= base_url('favicon.ico') ?>" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" />

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2Pkf1R9G8aZ2k+7Gaxm0iZx1WgP2n6hV3Qxq5wCqN1mW0j5p5Z3GqZ9Q0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/theme.css') ?>" />
  </head>
  <body class="has-navbar-fixed-top">
    <!-- Nav -->
    <nav class="navbar is-fixed-top is-transparent">
      <?php $isLoggedIn = session('isLoggedIn'); $username = session('user_username'); ?>
      <div class="navbar-brand">
        <a class="navbar-item brand-text" href="<?= site_url('/') ?>">
          <span class="icon has-text-pink"><i class="fa-solid fa-heart"></i></span>
          <strong>Blossom</strong>
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="mainNav">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div id="mainNav" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="<?= site_url('/') ?>">Home</a>
          <a class="navbar-item" href="<?= site_url('notes') ?>">Notes</a>
        </div>
        <div class="navbar-end">
          <?php if ($isLoggedIn): ?>
            <div class="navbar-item">
              <span class="tag is-soft is-medium">Hi, <?= esc($username) ?></span>
            </div>
            <div class="navbar-item">
              <a class="button is-light is-rounded" href="<?= site_url('logout') ?>">
                <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span>Logout</span>
              </a>
            </div>
          <?php else: ?>
            <a class="navbar-item" href="<?= site_url('login') ?>"><span class="icon"><i class="fa-regular fa-user"></i></span><span>Login</span></a>
            <div class="navbar-item">
              <a class="button is-gradient is-rounded" href="<?= site_url('register') ?>">
                <span class="icon"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
                <span>Get Started</span>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <!-- Hero header with soft gradient -->
    <section class="hero is-medium hero-gradient">
      <div class="hero-body">
        <?= $this->renderSection('hero') ?>
      </div>
    </section>

    <!-- Main content -->
    <main class="section">
      <div class="container">
        <?php if (session()->getFlashdata('message')): ?>
          <div class="notification is-info is-light">
            <?= esc(session()->getFlashdata('message')) ?>
          </div>
        <?php endif; ?>
        <?= $this->renderSection('content') ?>
      </div>
    </main>

    <!-- Footer -->
    <footer class="footer soft-footer">
      <div class="content has-text-centered">
        <p>
          <strong>Blossom</strong> by <a href="#">You</a>. Built with <span class="icon has-text-danger"><i class="fa-solid fa-heart"></i></span> on CodeIgniter 4 & Bulma.
        </p>
        <p class="is-size-7 has-text-grey">Environment: <?= ENVIRONMENT ?> • Rendered in {elapsed_time}s</p>
      </div>
    </footer>

    <script>
      // Bulma navbar burger toggle
      document.addEventListener('DOMContentLoaded', () => {
        const $burgers = Array.from(document.querySelectorAll('.navbar-burger'));
        $burgers.forEach(($el) => {
          $el.addEventListener('click', () => {
            const target = $el.dataset.target;
            const $target = document.getElementById(target);
            $el.classList.toggle('is-active');
            $target.classList.toggle('is-active');
          });
        });
      });
    </script>
  </body>
  </html>
