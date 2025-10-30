<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Welcome<?= $this->endSection() ?>

<?= $this->section('hero') ?>
  <?php $isLoggedIn = session('isLoggedIn'); $username = session('user_username'); ?>
  <div class="columns is-vcentered">
    <div class="column is-7">
      <h1 class="title is-1 has-text-weight-bold">
        <?= $isLoggedIn ? 'Welcome back, ' . esc($username) . ' ✨' : 'Hey, gorgeous ✨' ?>
      </h1>
      <p class="subtitle is-5 mt-3">
        A fresh, modern CRUD starter built on CodeIgniter 4 and styled with Bulma — soft gradients, clean cards, and a dash of sparkle.
      </p>
      <div class="buttons mt-4">
        <?php if ($isLoggedIn): ?>
          <a class="button is-gradient is-medium is-rounded" href="<?= site_url('notes') ?>">
            <span class="icon"><i class="fa-regular fa-note-sticky"></i></span>
            <span>Go to Notes</span>
          </a>
          <a class="button is-light is-medium is-rounded" href="<?= site_url('logout') ?>">
            <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
            <span>Logout</span>
          </a>
        <?php else: ?>
          <a class="button is-gradient is-medium is-rounded" href="<?= site_url('register') ?>">
            <span class="icon"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
            <span>Create account</span>
          </a>
          <a class="button is-light is-medium is-rounded" href="<?= site_url('login') ?>">
            <span class="icon"><i class="fa-regular fa-user"></i></span>
            <span>Login</span>
          </a>
        <?php endif; ?>
      </div>
      <div class="tags mt-4">
        <span class="tag is-soft is-medium">CodeIgniter 4</span>
        <span class="tag is-soft is-medium">Bulma CSS</span>
        <span class="tag is-soft is-medium">Modern UI</span>
      </div>
    </div>
    <div class="column is-5 is-relative">
      <div class="soft-card p-5">
        <p class="has-text-weight-semibold mb-3">What’s this app?</p>
        <p class="is-size-6">
          Blossom Notes is a simple notes application. Capture ideas, tasks, and reminders,
          then come back to edit or remove them anytime. Sign in to keep your notes safe
          and stored in the database so they’re available whenever you return.
        </p>
        <ul class="mt-3">
          <li>• Create and save notes</li>
          <li>• View all notes at a glance</li>
          <li>• Edit and update content</li>
          <li>• Delete notes you no longer need</li>
          <li>• Clean UI with Bulma + CI4</li>
        </ul>
      </div>
      <span class="blob blob-pink" style="top:-20px; right:-20px; width:120px; height:120px; border-radius:9999px;"></span>
      <span class="blob blob-lav" style="bottom:-20px; left:-10px; width:160px; height:160px; border-radius:9999px;"></span>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="columns is-multiline">
    <div class="column is-4">
      <div class="soft-card p-5">
        <p class="title is-5">Developer Friendly</p>
        <p class="is-size-6 has-text-grey">Keep your controllers thin and your views cute. Layouts, sections, and components for fast dev.</p>
      </div>
    </div>
    <div class="column is-4">
      <div class="soft-card p-5">
        <p class="title is-5">Bulma Utilities</p>
        <p class="is-size-6 has-text-grey">Use Bulma’s grid, forms, and helpers. Add sass if you want deeper customization later.</p>
      </div>
    </div>
    <div class="column is-4">
      <div class="soft-card p-5">
        <p class="title is-5">Pretty by Default</p>
        <p class="is-size-6 has-text-grey">Pastels, soft shadows, and rounded corners — a gentle vibe that still feels professional.</p>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
