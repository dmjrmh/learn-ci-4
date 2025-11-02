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
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (10 * ($currentPage - 1)); ?>
          <?php foreach ($users as $user): ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $user['name'] ?></td>
              <td><?= $user['address'] ?></td>
              <td><a href="/users" class="btn btn-success">Detail</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?= $pager->links('users', 'user_pagination'); ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>