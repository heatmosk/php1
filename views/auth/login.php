<div><?= $message ?></div>
<form action="/auth/login" enctype="multipart/form-data" method="post">
  <div><label>Логин</label>:<input type="text" name="login" required value="" /></div>
  <div><label>Пароль</label>:<input type="password" name="password" required value="" /></div>
  <div><input type="submit" value="Войти" /></div>
</form>