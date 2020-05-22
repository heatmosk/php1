<ul class="menu"> 
  <?php foreach ($menu as $menuItem) : ?>
    <li class="menu__item">
      <a href="<?= $menuItem["href"] ?>"><?= $menuItem["text"] ?></a>
    </li>
  <?php endforeach; ?>
</ul>

 