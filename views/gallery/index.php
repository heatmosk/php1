<div class="gallery">
  <div>
    <a href="/gallery/add">Добавить изображение</a>
  </div>

  <?php if (($imagesCounter ?? 0) == 0) : ?>
    В галереи нет изображений
  <?php else : ?>
    <?php foreach ($galleryImages as $image) : ?>
      <a href='/gallery/view?id=<?= $image['id'] ?>'>
        <div class='gallery__item'>
          <img class="gallery__item_preview" src='<?= $image['previewfile'] ?>'>
        </div>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>
</div>