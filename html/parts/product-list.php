<?php
require_once(dirname(__FILE__) . '/../models/Product.php');
$products = Product::getList();
?>

<h1>Product List</h1>
<section id="products-section">
  <?php if (empty($products)) : ?>
    <small>No products available.</small>
  <?php else : ?>
    <?php foreach ($products as $product) : ?>
      <article>
        <h3><?php echo $product->getName() ?></h3>
        <p>Price: $<?php echo $product->getPrice() ?></p>
      </article>
    <?php endforeach; ?>
  <?php endif; ?>
</section>