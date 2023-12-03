<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Status</title>
</head>
<body>

<h2>Your Loan Status</h2>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blitzwork";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $currentBorrower = "Borrower's Name";  

    $result = $conn->query("SELECT * FROM loan_requests WHERE borrower_name = '$currentBorrower'");

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Amount: {$row['amount']} - Status: {$row['status']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No loan requests found.";
    }

    $conn->close();
?>

</body>
</html>
