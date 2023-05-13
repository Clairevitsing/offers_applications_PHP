<?php require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/db/pdo.php';


$stmt = $pdo->prepare(
  "SELECT *, title, content, date_created FROM offers 
    ORDER BY date_created DESC"
);
$results = $stmt->execute();
// var_dump($results);
?>

<div class="container">
  <h1>Toutes nos offres</h1>

  <?php foreach ($stmt as $offer) {
  ?>

    <div>
      <h3> <?php echo $offer['title'] ?></h3>

      <span class="badge bg-primary">
        <?php echo $offer['date_created'] ?>
      </span>

      <p class="text-center text-muted mt-5 mb-0"><a href="offer_item.php?id=<?php echo $offer['id'] ?>" class="fw-bold text-body"><u>More details</u></a></p>
    </div>

  <?php } ?>
</div>

require_once 'layout/footer.php';