<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1><?= $title ?></h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($comics as $comic): ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><img src="/images/<?= $comic['cover'] ?>" alt="Naruto" class="cover-image"></td>
              <td><?= $comic['title'] ?></td>
              <td><a href="" class="btn btn-success">Detail</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection() ?>