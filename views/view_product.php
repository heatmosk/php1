<div class='content'>
  <div class='images'>
    <img src='<?= $product["image"]['filename'] ?>'>
  </div>
  <div class='reviews'>

    <div>Наименование товара: <?= $product['product_name'] ?></div>
    <div>Цена: <?= $product['cost'] ?></div>
    <div>Описание: <?= $product['product_description'] ?></div>
    <h4>Количество просмотров: <?= $views ?></h4>
    <div class='reviews__header'>Отзывы: <?= $reviewsCounter == 0 ? "отсутствуют" : $reviewsCounter ?></div>
    <a href="/?page=add_review&id=<?= $productId ?>">Добавить отзыв</a>
    <a class='catalog__item__link' href='/?page=add_product&id=<?= $product['id'] ?>'>
      Добавить в корзину
    </a>

    <?php if ($reviewsCounter > 0) : ?>
      <h4>Отзывы наших клиентов:</h4>
      <?php foreach ($reviews as $review) : ?>
        <div class='review__text'>
          <div><?= $review["review_text"] ?></div>
          <div>Оценка: <?= $review["rating"] ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>
</div>