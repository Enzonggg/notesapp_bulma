<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Notes<?= $this->endSection() ?>

<?= $this->section('hero') ?>
  <?php $username = session('user_username'); ?>
  <div class="is-flex is-justify-content-space-between is-align-items-center">
    <div>
      <h1 class="title is-2">Your Notes 🌷</h1>
      <p class="subtitle is-6">Hi, <?= esc($username) ?> — create, edit, and keep track of your ideas.</p>
    </div>
    <a href="<?= site_url('notes/create') ?>" class="button is-gradient is-rounded">
      <span class="icon"><i class="fa-solid fa-plus"></i></span>
      <span>New Note</span>
    </a>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <?php if (session()->getFlashdata('message')): ?>
    <div class="notification is-success is-light">
      <?= esc(session()->getFlashdata('message')) ?>
    </div>
  <?php endif; ?>

  <?php if (empty($notes)): ?>
    <div class="soft-card p-6 has-text-centered">
      <p class="mb-4">No notes yet.</p>
      <a class="button is-gradient is-rounded" href="<?= site_url('notes/create') ?>">Create your first note</a>
    </div>
  <?php else: ?>
    <div class="columns is-multiline">
      <?php foreach ($notes as $note): ?>
        <div class="column is-4">
          <div class="soft-card p-5 h-100">
            <p class="title is-5 mb-2"><?= esc($note['title']) ?></p>
            <p class="is-size-7 has-text-grey">Created: <?= esc($note['created_at']) ?></p>
            <div class="mt-3">
              <p class="is-size-6" style="white-space: pre-wrap;"><?= esc($note['content']) ?></p>
            </div>
            <div class="buttons mt-4">
              <a class="button is-small is-link is-light" href="<?= site_url('notes/edit/' . $note['id']) ?>">Edit</a>
              <form class="ml-2" action="<?= site_url('notes/delete/' . $note['id']) ?>" method="post" onsubmit="return confirm('Delete this note?')">
                <?= csrf_field() ?>
                <button class="button is-small is-danger is-light" type="submit">Delete</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
<?= $this->endSection() ?>
