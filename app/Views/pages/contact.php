<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Contact</h2>
      <?php foreach($address as $add) : ?>
        <ul>
          <li><?= $add['type'] ?></li>
          <li><?= $add['address'] ?></li>
        </ul>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>