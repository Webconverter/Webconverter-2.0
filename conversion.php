<?php

$imagefile = null;
 function createvar ($ffrom){

   //This does not scele to more than two formats
   if($ffrom == "jpg"){
    $imageobject = imagecreatefromjpeg($imageFile);
    imagepng($imageobject, $imagefile. '.png');
    if(!$imagefile){
      die("it failed mate");
    }
   }
   else{
     die ("soon");
   }

  return $imageobject;

 }




?>
