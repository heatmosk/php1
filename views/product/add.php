<div>
  <form action="" enctype="multipart/form-data" method="post">
    <div>
      <label>Название товара: </label>
    </div>
    <div>
      <input required type="text" name="product[name]" value="<?= $product["name"] ?>" />
    </div>
    <div>
      <label>Стоимость товара: </label>
    </div>
    <div>
      <input required type="text" name="product[cost]" value="<?= $product["cost"] ?>" />
    </div>
    <div>
      <label>Описание товара: </label>
    </div>
    <div>
      <textarea required name="product[description]" rows="20" cols="45"><?= $product["description"] ?></textarea>
    </div>
    <div>
      <input type="submit" value="Отправить" />
    </div>
  </form>
</div>