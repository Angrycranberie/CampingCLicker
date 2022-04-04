<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityClickerTest";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$code = $_POST["code"];

$sql = $conn->prepare("SELECT score, clickLvl, autoGLvl FROM savedgames WHERE code = ?"); //protection from sql injection
$sql->bind_param('s',$code);
$sql->execute();
$result = $sql->get_result();

if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo $row["score"] . "|" . $row["clickLvl"] . "|" . $row["autoGLvl"]; //get data and add a separator before pass it to unity
    }
} else {
    echo "-1";
}

$conn->close();

?>