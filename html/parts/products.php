<?php
require_once(dirname(__FILE__) . '/../models/Product.php');
$products = Product::getList();
?>

<h1>Liste des produits</h1>
<section id="products-section">
  <?php if (empty($products)) : ?>
    <small>Aucun produit disponible pour l'instant</small>
  <?php else : ?>
    <?php foreach ($products as $product) : ?>
      <article>
        <h3><?php echo $product->getName() ?></h3>
        <p>Prix: $<?php echo $product->getPrice() ?></p>
      </article>
    <?php endforeach; ?>
  <?php endif; ?>
</section>