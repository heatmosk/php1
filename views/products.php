<div>В каталоге товаров: <?= $productsCounter ?></div>
<div class='catalog'>
  <?php foreach ($products as $product) : ?>
    <div class='catalog__item'>
      <div>
        <a class='catalog__item__link' href='/?page=view_product&id=<?= $product['id'] ?>'>
          <?= $product['product_name'] ?>
        </a>
        <a class='catalog__item__link' href='/?page=add_product&id=<?= $product['id'] ?>'>
          Добавить в корзину
        </a>
      </div>
      <div>
        <a class='catalog__item__link' href='/?page=view_product&id=<?= $product['id'] ?>'>
          <img class='product__image-preview' src='<?= $product['image']['previewfile'] ?>'>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>