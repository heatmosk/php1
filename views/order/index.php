<?php if (empty($orders)) : ?>
  <div>Заказов пока что не было</div>
<?php else : ?>
  <div>Список моих заказов</div>
  <?php foreach ($orders as $order) : ?>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
      </tr>
      <?php foreach ($order["products"] as $product) : ?>
        <tr>
          <td><?= $product["name"] ?></td>
          <td><?= $product["cost"] ?></td>
          <td><?= $product["amount"] ?></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <td>Общая сумма: </td>
        <td colspan="2"><?= $order["totalCost"] ?></td>
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
  }
</style>