<div>Просмотров: <?= $image["views"] ?></div>
<?php if ($user["editor"] ?? false) : ?>
  <form action="/gallery/delete" enctype="multipart/form-data" method="post">
    <input type="hidden" name="image_id" value="<?= $image['id'] ?>" />
    <input class='catalog__item__link' type="submit" value="Удалить изображение" />
  </form>
<?php endif; ?>
<img class="gallery__item_image" src="<?= $image["originalfile"] ?>" />