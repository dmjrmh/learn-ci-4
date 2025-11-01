<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/images/<?= $comic['cover'] ?>" class="img-fluid rounded-start" alt="<?= $comic['title'] ?>">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $comic['title'] ?></h5>
              <h6 class="card-subtitle">Author: <?= $comic['author'] ?></h6>
              <p class="card-text">Publisher: <?= $comic['publisher'] ?></p>
              <a href="/comics/edit/<?= $comic['slug'] ?>" class="btn btn-warning">Edit</a>
              <form action="/comics/delete/<?= $comic['id'] ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
              </form>
              <br>
              <a href="/comics" class="btn btn-primary mt-3">Back to Comics List</a>
            </div>
          </div>
        </div> 
      </div> 
    </div>
  </div>
</div>
<?= $this->endSection() ?>