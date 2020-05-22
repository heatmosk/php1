<div>
  <h2>Добавьте свой отзыва</h2>
  <form action="" enctype="multipart/form-data" method="post">
    <input readonly type="hidden" name="review[product_id]" value="<?= $productId ?>">
    <div>
      <label>Ваша оценка:</label>
    </div>
    <div>
      <select name="review[rate]">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <div>
      <label>Отзыв: </label>
    </div>
    <div>
      <textarea name="review[review]" rows="20" cols="45"></textarea>
    </div>
    <div>
      <input type="submit" value="Отправить">
    </div>
  </form>
</div>