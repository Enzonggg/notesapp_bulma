<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('hero') ?>
  <div class="has-text-centered">
    <h1 class="title is-2">Welcome back 💖</h1>
    <p class="subtitle is-6">Sign in to continue your journey.</p>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="columns is-centered">
    <div class="column is-5">
      <div class="soft-card p-6">
        <?php $errors = session('errors') ?? []; ?>
        <?php if (! empty($errors)): ?>
          <div class="notification is-danger is-light">
            <?= esc(implode("\n", array_values($errors))) ?>
          </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('login') ?>">
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

          <div class="field is-flex is-justify-content-space-between is-align-items-center">
            <label class="checkbox">
              <input type="checkbox" name="remember" />
              Remember me
            </label>
            <a href="#" class="is-size-7">Forgot password?</a>
          </div>

          <div class="field mt-5">
            <button class="button is-gradient is-fullwidth is-rounded">Login</button>
          </div>

          <p class="has-text-centered is-size-7 mt-3">New here? <a href="<?= site_url('register') ?>">Create an account</a></p>
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
