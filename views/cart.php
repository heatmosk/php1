<div class="cart">
  <?php if (count($cart["products"]) == 0) : ?>
    Корзина пуста
  <?php else : ?>
    <table cellpaddin="0" cellspacing="0">
      <tr>
        <th>Название</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Стоимость</th>
        <th></th>
      </tr>
      <?php foreach ($cart["products"] as $product) : ?>
        <tr class="cart__product">
          <td>
            <a href="/?page=view_product&id=<?= $product["id"] ?>"><?= $product['product_name'] ?></a>
          </td>
          <td>
            <?= $product['amount'] ?>
          </td>
          <td>
            <?= $product['cost'] ?>
          </td>
          <td>
            <?= $product['totalCost'] ?>
          </td>
          <td>
            <a href="/?page=remove_product&id=<?= $product["id"] ?>">Убрать</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <div>Итого: <?= $cart["cost"] ?> </div>
  <?php endif; ?>
</div>