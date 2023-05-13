<?php
require_once __DIR__ . '/../layout/header.php';
session_start();

$offer_Id = $_GET['id'];
// var_dump($offer_Id);
?>


<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Apply for this position</h2>


                            <?php if (isset($_SESSION['flash_message'])) { ?>
                                <div class="alert alert-warning">
                                    <?php echo $_SESSION['flash_message']; ?>
                                </div>
                            <?php
                                unset($_SESSION['flash_message']);
                            }
                            ?>


                            <form method="post" action="register_process.php?id=<?php echo $offer_Id ?>" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="offer" value="<?php echo $offer_Id; ?>">
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Name</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" placeholder="name" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Firstname</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="firstname" placeholder="firstname" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Email</label>
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" placeholder="Email" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label>Please fill in the application date:
                                        <input type="date" name="date" required pattern="\d{4}-\d{2}-\d{2}">
                                        <span class="validity"></span>
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="upload" />
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>