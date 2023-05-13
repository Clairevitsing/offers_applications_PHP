<?php

use App\candidate;

require_once __DIR__ . '/../db/pdo.php';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../classes/candidate.php';
require_once __DIR__ . '/../functions/uploadFile.php';
require_once __DIR__ . '/../functions/redirect.php';
require_once __DIR__ . '/../classes/registerInformation.php';

// var_dump($_GET, $_FILES, $_POST);

if (isset($_GET['id']) && isset($_FILES['upload'])) {
    try {
        $cv = uploadFile($_FILES['upload'], __DIR__ . '/cv/');
        $candidate = new candidate(
            $_POST['date'],
            $_POST['name'],
            $_POST['firstname'],
            $_POST['email'],
            $cv,
            $_GET['id'],
        );
        var_dump($cv);
    } catch (Exception $e) {
        $_SESSION['flash_message'] = 'Failed to insert CV';
        redirect('register.php?error=' . registerError::UNABLE_UPLOAD_FILE);
    }


    $date = $candidate->getApplication_date();
    $name = $candidate->getName();
    $firstname = $candidate->getFirstname();
    $email = $candidate->getEmail();
    $cv = $candidate->getCV();
    $offer_Id = $candidate->getOffer_Id();


    $stmt = $pdo->prepare(
        "INSERT INTO applications (application_date, name, firstname, email, cv, offer_id) VALUES ( :application_date, :name, :firstname,:email,:cv, :offer_id)"
    );
    $result = $stmt->execute([
        ':application_date' => date('Y-m-d', strtotime($date)),
        // ':application_date' =>  $_POST['date'],
        ':name' => $name,
        ':firstname' => $firstname,
        ':email' => $email,
        ':cv' => $cv,
        ':offer_id' => $offer_Id,
    ]);


    // var_dump($result);

    if ($result) {
        session_start();
        $_SESSION['flash_message'] = 'Application was sent successfully';
        redirect('../index.php?success=' . registerSuccess::REGISTER_SUCCESS);
    } else {
        $_SESSION['flash_message'] = 'Failed to insert application';
        redirect('register.php?error=' . registerError::UNABLE_INSERT_APPLICATION);
    }
}
