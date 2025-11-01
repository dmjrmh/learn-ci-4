<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form add new comic</h2>
      <form action="/comics/store" method="post">
        <?= csrf_field(); ?>
        <div class="row mb-3">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" autofocus>
          </div>
        </div>
        <div class="row mb-3">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="author" name="author">
          </div>
        </div>
        <div class="row mb-3">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="publisher" name="publisher">
          </div>
        </div>
        <div class="row mb-3">
          <label for="cover" class="col-sm-2 col-form-label">Cover</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="cover" name="cover">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add new comic</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>