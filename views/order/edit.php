<div>
  <div>Заказ пользователя <?= $order["user"]["name"] ?> (<?= $order["user"]["login"] ?>)</div>
  <form action="" enctype="multipart/form-data" method="post">
    <input readonly type="hidden" name="order_id" value="<?= $order["id"] ?>" />
    <label>Изменить статус</label>
    <select name="status">
      <?php foreach ($statuses as $status) : ?>
        <option value="<?= $status["id"] ?>" <?= $status["id"] === $order["status"]["id"] ? "selected" : "" ?>>
          <?= $status["status"] ?>
        </option>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="Сохранить" />
  </form>
  <form action="/order/delete" enctype="multipart/form-data" method="post">
    <input readonly type="hidden" name="order_id" value="<?= $order["id"] ?>" />
    <input type="submit" value="Удалить" />
  </form>
  <table cellpadding="0" cellspacing="0"><?php foreach ($order["products"] as $product) : ?>
      <tr>
        <th colspan="2">Название</th>
        <th>Цена</th>
        <th colspan="2">Количество</th>
      </tr>
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
        <td>
          <?php if ($user["editor"] ?? false) : ?>
            <div><a href="/order/edit?id=<?= $order["id"] ?>">Редактировать</a></div>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>