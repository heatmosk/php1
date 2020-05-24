<?php if (empty($orders)) : ?>
  <div>Заказов пока что не было</div>
<?php else : ?>
  <div>Список заказов</div>
  <?php foreach ($orders as $order) : ?>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <th>Изображение </th>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
      </tr>
      <?php foreach ($order["products"] as $product) : ?>
        <tr>
          <td>
            <a href="/product/view?id=<?= $product["id"] ?>">
              <?php if ($product["image"] ?? false) : ?>
                <img src="<?= $product["image"]["previewfile"] ?>" />
              <?php else : ?>
                Изображение отсутствует
              <?php endif; ?>
            </a>
          </td>
          <td>
            <a href="/product/view?id=<?= $product["id"] ?>">
              <?= $product["name"] ?>
            </a>
          </td>
          <td><?= $product["cost"] ?></td>
          <td><?= $product["amount"] ?></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <td>Общая сумма: </td>
        <td colspan="3"><?= $order["totalCost"] ?></td>
      </tr>
      <tr>
        <td>Статус: </td>
        <td><?= $order["status"]["status"] ?></td>
        <td colspan="2">
          <?php if ($user["editor"] ?? false) : ?>
            <a href="/order/edit?id=<?= $order["id"] ?>">Редактировать</a>
          <?php endif; ?>
        </td>
      </tr>
    </table>
    <br />
    <hr />
    <br />

  <?php endforeach; ?>
<?php endif; ?>