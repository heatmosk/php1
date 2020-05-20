<div>
  <h2>Добавьте свой отзыва</h2>
  <form action="/?page=upload_image" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="<?= $productId ?>">
    <div>Ваша оценка: <select name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <div>Текст: </div>
    <div><textarea name="review_text" rows="10" cols="45"></textarea></div>
    <div><input type="submit"></div>
  </form>
</div>