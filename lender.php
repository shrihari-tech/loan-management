<?php

$name = $_POST['name'];
$age = $_POST['age'];
$status = $_POST['status'];
$gender= $_POST['gender'];
$email=$_POST['email'];
$address = $_POST['address'];
$phno=$_POST['phno'];
$work=$_POST['work'];
$account=$_POST['account'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blitzwork";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO lender (name, age,status,gender,email,address,phno,work,account)
VALUES ('$name', '$age', '$status', '$gender','$email','$address','$phno','$work','$account')";


if ($conn->query($sql) === TRUE) {
    echo "submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>