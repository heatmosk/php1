<div>
  <h2><?= $form_title ?></h2>
  <form action="" enctype="multipart/form-data" method="post">
    <input required type="file" name='images[]' multiple accept="<?= $acceptedImagesFilter ?>">
    <input type="submit">
  </form>
</div>