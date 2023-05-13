<?php require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/db/pdo.php';
session_start();


if (isset($_SESSION['flash_message'])) { ?>
  <div class="alert alert-success">
    <?php echo $_SESSION['flash_message']; ?>
  </div>
<?php
  unset($_SESSION['flash_message']);
}


$stmt = $pdo->prepare(
  "SELECT *, title, content, date_created FROM offers ORDER BY date_created DESC"
);
$results = $stmt->execute();
// var_dump($results);
// var_dump($_SESSION);
?>

<div class="container">
  <h1 class="text-center my-5">Toutes nos offres</h1>
  <div class="row">

    <?php foreach ($stmt as $offer) {
    ?>

      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h3> <?php echo $offer['title'] ?></h3>

            <span class="badge bg-primary">
              <?php echo $offer['date_created'] ?>
            </span>

            <p class="text-center text-muted mt-5 mb-0"><a href="/templates/offer_item.php?id=<?php echo $offer['id'] ?>" class="fw-bold text-body"><u>More details</u></a></p>
          </div>
        </div>
      </div>

    <?php } ?>
  </div>
</div>

<?php require_once 'layout/footer.php';
