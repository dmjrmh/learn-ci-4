<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1><?= $title ?></h1>
      <form action="" method="GET">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Input keyword ..." aria-describedby="button-addon2" name="keyword">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col">

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