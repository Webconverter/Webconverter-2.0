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

//do not run unless for init
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
}
function stat_db_png() {
}
$conn->close();
?>
