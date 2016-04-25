<?php
$target_dir = "uploads/";
$target_file = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';

$fName = $_REQUEST['name']; // Filnavn (ex: "Tiss.png")
// Skift til random
$fName = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
$fFrom = $_REQUEST['from']; // Filtype fra
$fTo = $_REQUEST['to']; // Filtype til
$fWidth = $_REQUEST['width'];
$fHeight = $_REQUEST['height'];
$fDelmeta = $_REQUEST['delmeta']; // Checkbox, delete meta
$fFile = $_REQUEST['file']; // Selve bildet
// Target file må vell være selve filen, ikke filnavnet??
$target_file = $fFile;

/*****
FOR Å TESTE OM ALT BLIR SENDT:
******/
die("Filnavn: ".$fName."<br /> Fra: ".$fFrom."<br />Til: ".$fTo."<br /> Bredde: ".$fWidth."<br />Høgde: ".$fHeight."<br />Meta: ".$fDelmeta."<br />Fil: ".$fFile);
/*********/

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    die;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
