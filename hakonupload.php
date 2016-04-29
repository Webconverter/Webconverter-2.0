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
    $fFile = $_REQUEST['fileToUpload']; // Selve bildet
    if (!empty($_FILES)) {
        $tempFile = $_FILES['fileToUpload'];
        $fFile = $tempFile;
    }
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
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    die;
    $uploadOk = 0;
}


include('imagetopng.php');
/****************************
*****************************/

$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter the $filename
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension




/*****************************
*****************************/




if ($fTo == "jpg"){ // Convert to JPG
    /*******************************************/

        // START PHP Image Upload Error Handling --------------------------------
        if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
             // This condition is only if you wish to allow uploading of specific file types    
             echo "ERROR: Your image was not .gif, .jpg, or .png.";
             unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
             exit();
        } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
            echo "ERROR: An error occured while processing the file. Try again.";
            exit();
        }
        // END PHP Image Upload Error Handling ----------------------------------
        // Place it into your "uploads" folder mow using the move_uploaded_file() function
        $moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");
        // Check to make sure the move result is true before continuing
        if ($moveResult != true) {
            echo "ERROR: File not uploaded. Try again.";
            exit();
        }
        // Include the file that houses all of our custom image functions
        include_once("ak_php_img_lib_1.0.php");
        // ---------- Start Universal Image Resizing Function --------
        $target_file = "uploads/$fileName";
        $resized_file = "uploads/resized_$fileName";
        $wmax = 500;
        $hmax = 500;
        ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
        // ----------- End Universal Image Resizing Function ----------
        // ---------- Start Convert to JPG Function --------
        if (strtolower($fileExt) != "jpg") {
            $target_file = "uploads/resized_$fileName";
            $new_jpg = "uploads/resized_".$kaboom[0].".jpg";
            ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
        }
        // ----------- End Convert to JPG Function -----------
        // Display things to the page so you can see what is happening for testing purposes
        echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
        echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
        echo "It is an <strong>$fileType</strong> type of file.<br /><br />";
        echo "The file extension is <strong>$fileExt</strong><br /><br />";
        echo "The Error Message output for this upload is: $fileErrorMsg";

    /**************************************/
}else if($fTo == "png"){ // Convert to PNG
    $theFile = imageToPng($fFile);
}else if($fTo == "gif"){ // Convert to GIF

}


?>
