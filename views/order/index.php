<?php if (empty($orders)) : ?>
  <div>Заказов пока что не было</div>
<?php else : ?>
  <div>Список моих заказов</div>
  <?php foreach ($orders as $order) : ?>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <th colspan="2">Название</th>
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
    </table>
    <br />
    <hr />
    <br />

  <?php endforeach; ?>
<?php endif; ?>


<style type="text/css">
  th,
  td {
    padding: 5px 10px;
    border: 1px solid #ccc;
    text-align: center;
    vertical-align: middle;
  }
</style>