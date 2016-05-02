<?php
$ffrom = null;
$imagefile = null;

$imgformat
 function createvar (){

   //This does not scele to more than two formats
   if($ffrom == "jpg"){
    $imageobject = imagecreatefromjpeg($imageFile);
    imagepng($imageobject, $imagefile. '.png')
   }
   else{
   $imageobject = imagecreatefrompng($imagefile)
   imagejpeg($imageobject, $imagefile. '.jpg')
   }
 }




?>
