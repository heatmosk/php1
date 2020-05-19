<div class='content'>
  <div class='images'>
    <img src='<?= $product["image"]['filename'] ?>'>
  </div>
  <div class='reviews'>
    <div class='reviews__header'>Отзывы: <?= $reviewsCounter == 0 ? "отсутствуют" : $reviewsCounter ?></div>
    <a href="/?page=add_review&id=<?= $productId ?>">Добавить отзыв</a>
    <h3>Наименование товара: <?= $product['product_name'] ?></h3>
    <div>Описание: <?= $product['product_description'] ?></div>
    <h4>Количество просмотров: <?= $views ?></h4>

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