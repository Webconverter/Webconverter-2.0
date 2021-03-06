<?php
require 'conversion.php';
require 'stats.php';
$target_dir = "uploads/";
$target_png = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . 'png';
$target_output = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid();
//$target_file = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$fto;
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
    $fName = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . 'jpg';
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
    $fFile = $_FILES['fileToUpload']; // Selve bildet
    /*if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fFile = $tempFile;
    }*/
$target_file = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . $Ffrom;
 echo $filextension;
 $filextension = $_FILES['fileToUpload']['name'];
 $fFrom = pathinfo($filextension, PATHINFO_EXTENSION);


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
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

//if($ffrom != "jpg" && $ffrom != "png" && $ffrom != "jpeg") {
//    die("file is not .jpg or .png");
//    $uploadOk = 0;
//}
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
  }else{
         die("file doesn't exist for some reason");
       }
   echo("<hr /><br /><div style='font-family:sans-serif;font-size:13px;line-height:1.5em;color:#333;padding:20px;margin:20px;background:#e1e1e1;border:1px solid #aaa;'>Filnavn: ".$fName."<br /> Fra: ".$fFrom."<br />Til: ".$fTo."<br /> Bredde: ".$fWidth."<br />Hoogde: ".$fHeight."<br />Meta: ".$fDelmeta."<br />Fil: ".$fFile."</div>");


   //This does not scale to more than two formats
  if($fFrom == "jpg"){
    $imageobject = imagecreatefromjpeg($target_file);
    imagepng($imageobject, $target_output. '.png');
    $fTo = ".png";
    stat_db_png();
      if(!$imageobject){
          die("error 0");
                       }
                     }
   else if($fFrom == "png"){
        $imageobject = imagecreatefrompng($target_file);
        imagejpeg($imageobject, $target_output. '.jpg');
        $fTo = ".jpg";
        stat_db_jpg();
        if(!$imageobject){
          die("error 1");
        }
       }

?>
<meta http-equiv="refresh" content="0; url=http://webconverter.ketil.xyz/<?php echo($target_output.$fTo); ?>">
