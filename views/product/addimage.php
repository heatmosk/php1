 <h2>Загрузка изображения товара</h2>
 <form action="" enctype="multipart/form-data" method="post">
   <input readonly type="hidden" name="product_id" value="<?= $productId ?>">
   <input required type="file" name='images[]' multiple accept="<?= $acceptedImagesFilter ?>">
   <input type="submit">
 </form>