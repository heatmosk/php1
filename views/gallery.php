
<div>
  <?php foreach ($galleryImages as $image) : ?>
    <a href='/?page=view_image&id=<?= $image['id'] ?>'>
      <div class='gallery__item'><img src='<?= $image['previewfile'] ?>'></div>
    </a>
  <?php endforeach; ?>
</div>
