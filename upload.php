<?php
$target_dir = "pliki/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "Typ pliku- " . $check["mime"] . ",\n";
    $uploadOk = 1;
  } else {
    echo "Dozwolone sa tylko zdjecia.\n";
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "Nie udało się wrzucić pliku.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "\"" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "\" został wrzucony na serwer.";
    } else {
      echo "Błąd.";
    }
  }
}
