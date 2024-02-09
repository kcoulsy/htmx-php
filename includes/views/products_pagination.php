<?php

$count = get_total_products();

$shown = $_GET['shown'] ?? 12;

$current_page = $_GET['page'] ?? 1;
$previous_page = $current_page - 1;
$next_page = $current_page + 1;

$total_pages = ceil($count / $shown);

$show_previous = $previous_page > 0;
$show_next = $next_page <= $total_pages;

$pages_to_show = 3;

$pages = [$previous_page, $current_page, $next_page];

?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php if ($show_previous) { ?>
      <li class="page-item">
        <button class="page-link" hx-target="#products" hx-get="/api/products.php?page=<?= $previous_page ?>">Previous</button>
      </li>
    <?php } ?>
    <?php foreach($pages as $page) { ?>
      <?php if ($page > 0 && $page <= $total_pages) { ?>
        <li class="page-item">
          <button class="page-link" hx-target="#products" hx-get="/api/products.php?page=<?= $page ?>"><?= $page ?></button>
        </li>
      <?php } ?>
    <?php } ?>
    <?php if ($show_next) { ?>
      <li class="page-item">
        <button class="page-link" hx-target="#products" hx-get="/api/products.php?page=<?= $next_page ?>">Next</button>
      </li>
    <?php } ?>
  </ul>
</nav>