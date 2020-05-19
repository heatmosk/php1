<div class="cart">
  <div class="cart__products">
    <?php if (count($cart["products"]) == 0) : ?>
      Корзина пуста
    <?php else : ?>
      <?php foreach ($cart["products"] as $product) : ?>
        <div c;ass="cart__product">
          <label>Название</label><a href="/?page=view_product&id=<?= $product["id"] ?>"><?= $product['name'] ?></a>
          <label>Название</label><?= $product['amount'] ?>
          <label>Название</label><?= $product['cost'] ?>
          <label>Название</label><?= $product['totalCost'] ?>
        </div>
      <?php endforeach; ?>
      <div>Итого: <?= $cart["cost"] ?> </div>
    <?php endif; ?>
  </div>
</div>