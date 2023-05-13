<?php

use App\candidate;

require_once __DIR__ . '/db/pdo.php';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/classes/candidate.php';
require_once __DIR__ . '/functions/uploadFile.php';
require_once __DIR__ . '/functions/redirect.php';
require_once __DIR__ . '/classes/registerError.php';

var_dump($_GET, $_FILES, $_POST);

if (isset($_GET['id']) && isset($_FILES['upload'])) {
    try {
        $cv = uploadFile($_FILES['upload'], __DIR__ . '/cv/');
        var_dump($cv);
    } catch (Exception $e) {
        redirect('register.php?error=' . registerError::UNABLE_UPLOAD_FILE);
    }

    $stmt = $pdo->prepare(
        "INSERT INTO applications (application_date, name, firstname, email, cv, offer_id) VALUES ( :application_date, :name, :firstname,:email,:cv, :offer_id)"
    );
    $result = $stmt->execute([
        ':application_date' => date('Y-m-d', strtotime($_POST['date'])),
        // ':application_date' =>  $_POST['date'],
        ':name' => $_POST['name'],
        ':firstname' => $_POST['firstname'],
        ':email' => $_POST['email'],
        ':cv' => $cv,
        ':offer_id' => $_GET['id']
    ]);

    // $stmt = $pdo->prepare(
    //     "INSERT INTO applications (application_date, name, firstname, email, cv, offer_id) VALUES (:application_date, :name, :firstname, :email, :cv, :offer_id)"
    // );

    // $dateString = $_POST['date'];
    // $dateTime = DateTime::createFromFormat('Y-m-d', $dateString);

    var_dump($result);

    if ($result) {
        $candidate = $stmt->fetch();
        var_dump($candidate);
    } else {
        redirect('register.php?error=' . registerError::UNABLE_INSERT_APPLICATION);
        echo 'Failed to insert application.';
    }
    // var_dump($result);

}
