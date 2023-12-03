<?php

$name = $_POST['name'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$gender= $_POST['gender'];
$email=$_POST['email'];
$address = $_POST['address'];
$phno=$_POST['phno'];
$qualification=$_POST['qualification'];
$account=$_POST['account'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blitzwork";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO borrower (name, dob, age,gender,email,address,phno,qualification,account)
VALUES ('$name', '$dob', '$age', '$gender','$email','$address','$phno','$qualification','$account')";


if ($conn->query($sql) === TRUE) {
    echo "submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>