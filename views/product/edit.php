<div>
  <form action="" enctype="multipart/form-data" method="post">
    <input readonly type="hidden" name="product[id]" value="<?= $product["id"] ?>" />
    <div>
      <label>Название товара: </label>
    </div>
    <div>
      <input required type="text" name="product[name]" value="<?= $product["name"] ?>" />
    </div>
    <div>
      <label>Стоимость товара: </label>
    </div>
    <div>
      <input required type="text" name="product[cost]" value="<?= $product["cost"] ?>" />
    </div>
    <div>
      <label>Количество просмотров товара: </label>
    </div>
    <div>
      <input required type="text" name="product[views]" value="<?= $product["views"] ?>" />
    </div>

    <div>
      <label>Описание товара: </label>
    </div>
    <div>
      <textarea required name="product[description]" rows="20" cols="45"><?= $product["description"] ?></textarea>
    </div>

    <div>
      <input type="submit" value="Отправить" />
    </div>
  </form>
  <div>
    <a href="/product/addimage?product_id=<?= $product["id"] ?>">Добавить изображение товара</a>
  </div>
  <?php if (!empty($product["images"])) : ?>
    <div>Фотографии товара: </div>
    <div class="gallery">
      <?php foreach ($product["images"] as $image) : ?>
        <div class="gallery__item">
          <a href="/gallery/view?id=<?= $image["id"] ?>">
            <img class="gallery__item_preview" src="<?= $image["previewfile"] ?>" />
          </a>
          <form action="/product/deleteimage" enctype="multipart/form-data" method="post">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
            <input type="hidden" name="image_id" value="<?= $image['id'] ?>" />
            <input class='catalog__item__link' type="submit" value="Удалить изображение" />
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>