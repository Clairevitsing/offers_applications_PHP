<?php
require_once __DIR__ . '/../classes/Exception/BadFormatFileException.php';

function uploadFile(array $file_upload, string $path): string
{
    // $file_upload = $_FILES['file'];
    $fileName = rand(1000, 100000) . "-" . $file_upload['name'];
    $tmpName = $file_upload['tmp_name'];
    $fileSize = $file_upload['size'];
    // $file_type = $file_upload['type'];

    /* new file size in KB*/
    // $new_size = $fileSize / 1024;

    /* make file name in lower case*/
    $new_file_name = strtolower($fileName);

    $fileName = str_replace(' ', '-', $new_file_name);

    $maxSize = 800000;

    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    $extension = strtolower($extension);

    $allowedExtensions = ['jpg', 'pdf'];

    if (in_array($extension, $allowedExtensions) && $fileSize <= $maxSize) {

        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName . "." . $extension;
        //$file = 5f586bf96dcd38.73540086.jpg

        move_uploaded_file($tmpName, $path . $fileName);
    } else {
        throw new BadFormatFileException();
    }
    return $file;
}
