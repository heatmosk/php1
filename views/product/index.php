<?php if ($user["editor"] ?? false) : ?>
  <div>
    <a href="/product/add">Добавить товар</a>
  </div>
<?php endif; ?>
<div>В каталоге товаров: <?= count($products) ?></div>
<div class='catalog'>
  <?php foreach ($products as $product) : ?>
    <div class='catalog__item'>
      <div>
        <a class='catalog__item__link' href='/product/view?id=<?= $product['id'] ?>'>
          <?= $product['name'] ?>
        </a>
      </div>
      <div>
        <?php if (isset($product["images"])) : ?>
          <a class='catalog__item__link' href='/product/view?id=<?= $product['id'] ?>'>
            <img class='product__image-preview' src='<?= array_shift($product['images'])['previewfile'] ?>'>
          </a>
        <?php endif; ?>
      </div>
      <form action="/cart/action" method="POST">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
        <input type="hidden" name="act" value="add" />
        <input class='catalog__item__link' type="submit" value="Добавить в корзину" />
      </form>
    </div>
  <?php endforeach; ?>
</div>