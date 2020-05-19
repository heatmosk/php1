<div class="cart">
  <div class="cart__products">
    <?php if (count($cart["products"]) == 0) : ?>
      Корзина пуста
    <?php else : ?>
      <div>
        <label>Название</label>
        <label>Количество</label>
        <label>Цена</label>
        <label>Стоимость</label>
      </div>
      <?php foreach ($cart["products"] as $product) : ?>
        <div c;ass="cart__product">
          <a href="/?page=view_product&id=<?= $product["id"] ?>"><?= $product['name'] ?></a>
          <?= $product['amount'] ?>
          <?= $product['cost'] ?>
          <?= $product['totalCost'] ?>
        </div>
      <?php endforeach; ?>
      <div>Итого: <?= $cart["cost"] ?> </div>
    <?php endif; ?>
  </div>
</div>