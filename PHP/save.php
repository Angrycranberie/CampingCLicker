<?php

//Save script

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$dbval = mysqli_select_db($conn, "UnityClickerTest");


$code = $_POST["code"];
$score = $_POST["score"];
$clickLvl = $_POST["clickLvl"];
$autoGLvl = $_POST["autoGLvl"];

$sql = "INSERT INTO savedgames (code, score, clickLvl, autoGLvl)
VALUES('".$code."', '".$score."', '".$clickLvl."', '".$autoGLvl."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
$conn->close();

?>