<?php
$target_dir = "uploads/";
$target_file = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid();
// Lag alle variabler så de fins uansett
$fileToUpload = null;
$fName = null;
$fFrom = null;
$fTo = null;
$fWidth = null;
$fHeight = null;
$fDelmeta = null;
$fFile = null;
$tempFile = null;
                    if (isset($_FILES['fileToUpload'])) {
if (isset($REQUEST['vname'])){
    $fName = $_REQUEST['vname']; // Filnavn (ex: "Tiss.png")
}
// Skift til random
    $fName = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
    $fFrom = $_REQUEST['from']; // Filtype fra
    $fTo = $_REQUEST['to']; // Filtype til
    $fWidth = $_REQUEST['width'];
    $fHeight = $_REQUEST['height'];
    if (isset($_REQUEST['delmeta'])){
        $fDelmeta = "yes";
    }else{
        $fDelmeta = "no";
    }
    //$fDelmeta = $_REQUEST['delmeta']; // Checkbox, delete meta
    $fFile = $_REQUEST['file']; // Selve bildet
    /*if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fFile = $tempFile;
    }*/
/* Husk å sikre alle values for MySQL injection her */
// Target file må vell være selve filen, ikke filnavnet??
$target_file = $fFile;

/*****
FOR Å TESTE OM ALT BLIR SENDT:
die("<hr /><br /><div style='font-family:sans-serif;font-size:13px;line-height:1.5em;color:#333;padding:20px;margin:20px;background:#e1e1e1;border:1px solid #aaa;'>Filnavn: ".$fName."<br /> Fra: ".$fFrom."<br />Til: ".$fTo."<br /> Bredde: ".$fWidth."<br />Hoogde: ".$fHeight."<br />Meta: ".$fDelmeta."<br />Fil: ".$fFile."</div>");
/*********/

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES['fileToUpload']["tmp_name"]);
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
if ($_REQUEST["fileToUpload"]["size"] > 50000000) {
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
    if (move_uploaded_file($_REQUEST["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if ($fTo == "jpg"){ // Convert to JPG


}else if($fTo == "png"){ // Convert to PNG

}else if($fTo == "gif"){ // Convert to GIF

}

                    }
?>
