<?php
require_once(dirname(__FILE__) . '/../models/Product.php');
$products = Product::getList();
?>

<h1>Product List</h1>
<section id="products-section">
  <?php if (empty($products)) : ?>
    <p>No products available.</p>
  <?php else : ?>
    <?php foreach ($products as $product) : ?>
      <article>
        <form action="handlers/place-order-handler.php" method="post">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $product->getImageUrl() ?>" alt="<?php echo $product->getName() ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $product->getName() ?></h5>
              <p class="card-text">Price: $<?php echo $product->getPrice() ?></p>
              <button type="submit" class="btn btn-primary">Order</button>
              <input type="hidden" name="product_id" value="<?php echo $product->getId() ?>">
            </div>
          </div>
        </form>
      </article>
    <?php endforeach; ?>
  <?php endif; ?>
</section>