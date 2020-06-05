<div class='content'>
  <div class='reviews'>

    <div>Наименование товара: <?= $product['name'] ?></div>
    <div>Цена: <?= $product['cost'] ?></div>
    <div>Описание: <?= $product['description'] ?></div>
    <div>Количество просмотров: <?= $product['views'] ?></div>
    <form action="/cart/action" enctype="multipart/form-data" method="post">
      <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
      <input type="hidden" name="act" value="add" />
      <input class='catalog__item__link' type="submit" value="Добавить в корзину" />
    </form>
    <?php if ($user["editor"] ?? false) : ?>
      <form action="/product/addreview" enctype="multipart/form-data" method="get">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
        <input class='catalog__item__link' type="submit" value="Добавить отзыв" />
      </form>
      <form action="/product/edit" enctype="multipart/form-data" method="get">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
        <input class='catalog__item__link' type="submit" value="Редактировать товар" />
      </form>
    <?php endif; ?>
    <div class='reviews__header'>Отзывы: <?= $reviewsCounter == 0 ? "отсутствуют" : $reviewsCounter ?></div>

    <?php if (!empty($product["reviews"])) : ?>
      <div>Отзывы наших клиентов:</div>
      <?php foreach ($product["reviews"] as $review) : ?>
        <div class='review__text'>
          <div><?= $review["review"] ?></div>
          <div>Оценка: <?= $review["rate"] ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <?php if (!empty($product["images"])) : ?>
    <div class='gallery'>
      <?php foreach ($product["images"] as $image) : ?>
        <a href='/gallery/view?id=<?= $image['id'] ?>'>
          <div class='gallery__item'>
            <img class="gallery__item_preview" src='<?= $image['previewfile'] ?>'>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>