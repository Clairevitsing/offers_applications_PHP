<?php require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/db/pdo.php';

$offer_Id = $_GET['id'];

$stmt = $pdo->prepare(
  "SELECT title, content, date_created FROM offers WHERE :id = $offer_Id"
);

// var_dump($stmt);

$result = $stmt->execute(
  [':id' => $offer_Id]
);
// var_dump($result);

if ($result) {
  $offer = $stmt->fetch();
  // var_dump($offer);
}
// var_dump($result);
?>


<div class="card mx-4 mt-5" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $offer['title']; ?></h5>


    <p><?php echo $offer['content'] ?></p>
  </div>
  <div class="d-flex justify-content-center">
    <button type="submit" name="postuler" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
      <a href="register.php?id=<?php echo $offer_Id; ?>" class="fw-bold text-body">Apply</button>
  </div>
</div>