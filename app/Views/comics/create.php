<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form add new comic</h2>
      <form action="/comics/store" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row mb-3">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('title') ? 'is-invalid' : '') ?>" id="title" name="title" autofocus value="<?= old('title') ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('title') ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('author') ? 'is-invalid' : '') ?>" id="author" name="author" value="<?= old('author') ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('author') ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('publisher') ? 'is-invalid' : '') ?>" id="publisher" name="publisher" value="<?= old('publisher') ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('publisher') ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="cover" class="col-sm-2 col-form-label">Cover</label>
          <div class="col-sm-2">
            <img src="/images/missing-cover.jpg" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <div class="mb-3">
              <input class="form-control <?= ($validation->hasError('cover') ? 'is-invalid' : '') ?>" type="file" id="cover" name="cover" onchange="previewImage()">
              <div class="invalid-feedback">
                <?= $validation->getError('cover') ?>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add new comic</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>