<?php
require_once __DIR__.'/../includes/functions.php';
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($pageTitle)? h($pageTitle): 'متجر معسلات' ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
  <div class="wrap">
    <nav class="nav">
      <div class="brand">
        <!-- شعار المتجر -->
        <img src="assets/12.png" alt="شعار المتجر" style="height:55px; border-radius:8px;">
        <a href="index.php" style="font-size:18px; font-weight:800; margin-right:8px;">متجر معسلات</a>
      </div>
      <div class="links">
        <a href="index.php">الرئيسية</a>
        <a href="category.php?cat=flavors">النكهات</a>
        <a href="category.php?cat=shisha">شيش</a>
        <a href="category.php?cat=electronic">شيش الالكترونيه</a>
        <a href="category.php?cat=charcoal">الفحم</a>
        <a href="category.php?cat=accessories">الإكسسوارات</a>
        <a href="category.php?cat=bundles">الباقات</a>
        <a href="cart.php" class="badge">السلة (<?= cart_count(); ?>)</a>
      </div>
    </nav>
  </div>
</header>
<div class="wrap">
