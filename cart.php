<?php
require_once __DIR__.'/includes/functions.php';
// معالجة POST
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['action'])){
  $action=$_POST['action'];
  if($action==='add' && isset($_POST['pid'])){ cart_add((int)$_POST['pid'], (int)($_POST['qty']??1)); }
  if($action==='update' && isset($_POST['pid'])){ cart_update((int)$_POST['pid'], (int)($_POST['qty']??1)); }
  if($action==='clear'){ $_SESSION['cart']=[]; }
  header('Location: cart.php'); exit;
}
$pageTitle='السلة';
require_once __DIR__.'/partials/header.php';
?>

<section class="section">
  <h2>سلة التسوق</h2>
  <?php if(!isset($_SESSION['cart']) || !$_SESSION['cart']): ?>
    <p>سلتك فارغة. <a class="btn alt" href="/">الرجوع للرئيسية</a></p>
  <?php else: ?>
    <table class="table">
      <thead>
        <tr><th>المنتج</th><th>السعر</th><th>الكمية</th><th>الإجمالي</th></tr>
      </thead>
      <tbody>
        <?php foreach($_SESSION['cart'] as $id=>$qty): $p=find_product($id); if(!$p) continue; ?>
          <tr>
            <td><?= h($p['name']); ?></td>
            <td><?= number_format($p['price'],2); ?> ر.س</td>
            <td>
              <form method="post" style="display:flex; gap:8px;">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="pid" value="<?= (int)$id; ?>">
                <input type="number" name="qty" value="<?= (int)$qty; ?>" min="0" style="width:70px;">
                <button class="btn" type="submit">تحديث</button>
              </form>
            </td>
            <td><?= number_format($p['price']*$qty,2); ?> ر.س</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="total">
      <div>الإجمالي: <strong><?= number_format(cart_total(),2); ?> ر.س</strong></div>
      <form method="post"><input type="hidden" name="action" value="clear"><button class="btn alt" type="submit">تفريغ السلة</button></form>
    </div>
  <?php endif; ?>
</section>

<?php require_once __DIR__.'/partials/footer.php'; ?>
