<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Register<?= $this->endSection() ?>

<?= $this->section('hero') ?>
  <div class="has-text-centered">
    <h1 class="title is-2">Create your account 🌸</h1>
    <p class="subtitle is-6">Join and start crafting beautiful things.</p>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="columns is-centered">
    <div class="column is-6">
      <div class="soft-card p-6">
        <?php $errors = session('errors') ?? []; ?>
        <?php if (! empty($errors)): ?>
          <div class="notification is-danger is-light">
            <?= esc(implode("\n", array_values($errors))) ?>
          </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('register') ?>">
          <?= csrf_field() ?>

          <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left">
              <input class="input" type="text" name="username" placeholder="demo" required />
              <span class="icon is-small is-left"><i class="fa-regular fa-user"></i></span>
            </div>
          </div>

          <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left">
              <input class="input" type="password" name="password" placeholder="••••••••" required />
              <span class="icon is-small is-left"><i class="fa-solid fa-lock"></i></span>
            </div>
          </div>

          <div class="field">
            <label class="label">Confirm Password</label>
            <div class="control has-icons-left">
              <input class="input" type="password" name="password_confirm" placeholder="••••••••" required />
              <span class="icon is-small is-left"><i class="fa-solid fa-lock"></i></span>
            </div>
          </div>

          <div class="field">
            <button class="button is-gradient is-fullwidth is-rounded">Create account</button>
          </div>
          <p class="has-text-centered is-size-7 mt-3">Already have an account? <a href="<?= site_url('login') ?>">Login</a></p>
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
