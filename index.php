<?php
$pageTitle='الرئيسية';
require_once __DIR__.'/partials/header.php';
?>

<!-- شعار كبير في الصفحة الرئيسية -->
<section style="text-align:center; margin:30px 0;">
  <img src="assets/12.png" alt="شعار المتجر" style="max-height:160px;">
</section>

<section class="hero">
  <div class="slider">
    <?php global $HOME_ADS; foreach($HOME_ADS as $ad): ?>
      <div class="slide">
        <h3><?= h($ad['title']); ?></h3>
        <p><?= h($ad['subtitle']); ?></p>
        <a class="cta" href="<?= h($ad['link']); ?>">شوف العرض</a>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section">
  <h2>الفئات</h2>
  <div class="grid">
    <?php global $CATEGORIES; foreach($CATEGORIES as $key=>$label): ?>
      <a class="card" href="category.php?cat=<?= h($key); ?>">
        <div class="prod-top">🏷️</div>
        <h4><?= h($label); ?></h4>
        <div class="price">ادخل القسم ⇦</div>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<?php require_once __DIR__.'/partials/footer.php'; ?>
