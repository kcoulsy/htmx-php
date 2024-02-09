<?php

$page = $_GET['page'] ?? 1;
$shown = $_GET['shown'] ?? 12;

$products = get_products($page, $shown);

$chunks = array_chunk($products, 3);

?>

<?php foreach ($chunks as $chunk) { ?>
  <div class="row d-flex justify-content-center g-1">
    <?php foreach ($chunk as $product) { ?>
      <div class="col-md-4">
        <div class="product text-center"> <img src="https://picsum.photos/seed/<?= $product['id'] ?>/250/300" width="250" height="300">
        <div class="about text-left px-3">
          <h4><?= $product['name'] ?></h4>
          <h3>Price $<?= $product['price'] ?></h3>
        </div> <span class="dot"><span class="inner-dot"><i class="fa fa-plus"></i></span></span>
      </div>
    </div>
    <?php } ?>
  </div>
<?php } ?>