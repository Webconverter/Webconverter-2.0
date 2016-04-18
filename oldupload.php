<?php
// header('Content-Type: application/json');
if(isset($_GET['file'])){
    $error = false;
    $data = array();
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
            $error = true;
            $data = ($error) ? array('error' => 'File is not an image') : array('files' => $files);
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $error = true;
        $data = ($error) ? array('error' => 'File already exists') : array('files' => $files);
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        // echo "Sorry, your file is too large.";
        $error = true;
        $data = ($error) ? array('error' => 'File too large') : array('files' => $files);
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $error = true;
        $data = ($error) ? array('error' => 'File is not JPG, JPEG, PNG or GIF') : array('files' => $files);
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    // -if ($uploadOk == 0) {
    // -    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    // -} else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            /*
            ?>
            <response>
                <result>12</result>
                <message><?php echo(basename( $_FILES["fileToUpload"]["name"])); ?> was uploaded.</message>
            </response>
            <?php
            */
            //echo json_encode($data);
        } else {
            // echo json_encode($data);
        }
}else{
        $data = array('success' => 'Form was submitted', 'formData' => $_POST);
}
    echo json_encode($data);
    // -}
?>