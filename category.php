<?php
require_once __DIR__.'/includes/functions.php';
$cat = $_GET['cat'] ?? '';
if(!isset($CATEGORIES[$cat])){ header('Location: /'); exit; }
$pageTitle = 'قسم: '.$CATEGORIES[$cat];
require_once __DIR__.'/partials/header.php';
$items = products_by_cat($cat);
$inlineAd = $INLINE_CATEGORY_AD[$cat] ?? null;
?>

<section class="section">
  <h2><?= h($CATEGORIES[$cat]); ?></h2>
  <?php if($inlineAd): ?>
    <div class="inline-ad">
      <div><?= h($inlineAd['text']); ?></div>
      <a class="btn alt" href="<?= h($inlineAd['link']); ?>">شوف العرض</a>
    </div>
  <?php endif; ?>

  <div class="grid">
    <?php foreach($items as $p): ?>
      <div class="card">
        <div class="prod-top">
          <?php if(isset($p['image']) && file_exists($p['image'])): ?>
            <img src="<?= h($p['image']); ?>" alt="<?= h($p['name']); ?>">
            <span class="emoji-fallback"><?= h($p['emoji']); ?></span>
          <?php else: ?>
            <span class="emoji-fallback"><?= h($p['emoji']); ?></span>
          <?php endif; ?>
        </div>
        <h4><?= h($p['name']); ?></h4>
        <div class="price"><?= number_format($p['price'],2); ?> ر.س</div>
        <form method="post" action="cart.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="pid" value="<?= (int)$p['id']; ?>">
          <input type="number" name="qty" value="1" min="1" style="width:70px;">
          <button class="btn" type="submit">أضف للسلة</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php require_once __DIR__.'/partials/footer.php'; ?>
