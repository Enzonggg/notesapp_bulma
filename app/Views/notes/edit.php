<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Note<?= $this->endSection() ?>

<?= $this->section('hero') ?>
  <div class="has-text-centered">
    <h1 class="title is-2">Edit Note 📝</h1>
    <p class="subtitle is-6">Update your thoughts.</p>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <?php $errors = session('errors') ?? []; ?>
  <div class="columns is-centered">
    <div class="column is-7">
      <div class="soft-card p-6">
        <form action="<?= site_url('notes/update/' . $note['id']) ?>" method="post">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="POST">

          <div class="field">
            <label class="label">Title</label>
            <div class="control">
              <input class="input <?= isset($errors['title']) ? 'is-danger' : '' ?>" name="title" type="text" value="<?= esc(old('title', $note['title'])) ?>" required>
            </div>
            <?php if (isset($errors['title'])): ?>
              <p class="help is-danger"><?= esc($errors['title']) ?></p>
            <?php endif; ?>
          </div>

          <div class="field">
            <label class="label">Content</label>
            <div class="control">
              <textarea class="textarea <?= isset($errors['content']) ? 'is-danger' : '' ?>" name="content" rows="6"><?= esc(old('content', $note['content'])) ?></textarea>
            </div>
            <?php if (isset($errors['content'])): ?>
              <p class="help is-danger"><?= esc($errors['content']) ?></p>
            <?php endif; ?>
          </div>

          <div class="field is-grouped is-justify-content-flex-end">
            <p class="control">
              <a class="button" href="<?= site_url('notes') ?>">Cancel</a>
            </p>
            <p class="control">
              <button class="button is-gradient" type="submit">Update</button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
