<?php
$ffrom = null;
$ffto = null;
$fsize = null;
//Change these to the settings of the server utilized for the project
$server = "empty";
$user = "username";
$pass = "password";

$conn = new mysqli($server, $user, $pass);

if ($conn->connect_error){
   die("connection failed");
}
echo "connected succsessfully";

function createstats() {
$createdbtable_stats =  "CREATE TABLE converter_stats (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fsize INT(30); NOT NULL,
  ftype VARCHAR(30) NOT NULL,
  fto VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP

)";
if ($conn->query($sql) === TRUE) {
    echo "Table converter_stats created successfully";
       }
else   {
    echo "Error creating table: " . $conn->error;
       }
}

function stat_db_jpg() {
  $sql = "INSERT INTO converter_stats (fsize, ftype, fto)
VALUES ('1', 'png', 'jpg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
function stat_db_png() {
  $sql = "INSERT INTO converter_stats (fsize, ftype, fto)
VALUES ('1', 'png', 'jpg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>
