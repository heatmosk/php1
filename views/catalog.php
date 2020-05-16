<div>В каталоге товаров: <?= count($products) ?></div>
<div class='catalog'>
  <?php foreach ($products as $product) : ?>
    <div class='catalog__item'>
      <div>
        <a class='catalog__item__link' href='/view_product.php?id=<?= $product['id'] ?>'>
          <h3><?= $product['product_name'] ?></h3>
        </a>
      </div>
      <div>
        <a class='catalog__item__link' href='/view_product.php?id=<?= $product['id'] ?>'>
          <img class='product__image-preview' src='<?= $product['previewfile'] ?>'>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>