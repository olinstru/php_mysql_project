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
        <form action="handlers/place-order-handler.php" method="post">
          <input type="hidden" name="product_id" value="<?php echo $product->getId() ?>">
          <button type="submit">Order</button>
        </form>
      </article>
    <?php endforeach; ?>
  <?php endif; ?>
</section>