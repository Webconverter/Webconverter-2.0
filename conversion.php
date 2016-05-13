<?php

$fFrom = null;
$target_file = $target_dir . 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . $Ffrom;

if($fFrom == "jpg"){
  $imageobject = imagecreatefromjpeg($target_file);
  imagepng($imageobject, $target_output. '.png');
  $fTo = ".png";
    if(!$imageobject){
        die("error 0");
                     }
                   }
 else if($fFrom == "png"){
      $imageobject = imagecreatefrompng($target_file);
      imagejpeg($imageobject, $target_output. '.jpg');
      $fTo = ".jpg";
      if(!$imageobject){
        die("error 1");
      }
     }

?>
