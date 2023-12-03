<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blitzwork";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['borrower']) && isset($_POST['lender']) && isset($_POST['amount'])) {
    $borrowerName = $_POST['borrower'];
    $lenderName = $_POST['lender'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO loan_requests (borrower_name, lender_name, amount) VALUES ('$borrowerName', '$lenderName', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Loan request submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
