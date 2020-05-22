<div class="cart">
  <?php if (empty($cart["products"])) : ?>
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
            <a href="/product/view?id=<?= $product["id"] ?>"><?= $product['name'] ?></a>
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
            <form action="/cart/action" enctype="multipart/form-data" method="post">
              <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
              <input type="hidden" name="act" value="add" />
              <input class='catalog__item__link' type="submit" value="Добавить" />
            </form>
            <form action="/cart/action" enctype="multipart/form-data" method="post">
              <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
              <input type="hidden" name="act" value="remove" />
              <input class='catalog__item__link' type="submit" value="Убрать" />
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <div>Итого: <?= $cart["cost"] ?> </div>
    <hr />
    <div>
      <form action="/order/add" enctype="multipart/form-data" method="post">
        <input type="hidden" name="cart_id" value="<?= $cart["id"] ?>" />
        <input type="submit" value="Оформить заказ" />
      </form>
    </div>
  <?php endif; ?>
</div>