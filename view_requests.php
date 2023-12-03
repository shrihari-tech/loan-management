<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        form {
            position: absolute;
            top: 25px;
            right: 10px;
            display: flex;
            align-items: center;
        }

        select {
            margin-right: 10px;
        }

        button {
            background-color: blue;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Loan Requests</h2>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blitzwork";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $requestId = $_POST['request_id'];
        $newStatus = $_POST['new_status'];

        $updateQuery = "UPDATE loan_requests SET status = '$newStatus' WHERE id = $requestId";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Status successfully updated.";
        } else {
            echo "Error updating status: " . $conn->error;
        }
    }

    $result = $conn->query("SELECT * FROM loan_requests");

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['borrower_name']} - Amount: {$row['amount']} - Status: {$row['status']} 
                    <form method='POST' action=''>
                        <input type='hidden' name='request_id' value='{$row['id']}'>
                        <select name='new_status'>
                            <option value='approved'>Approved</option>
                            <option value='rejected'>Rejected</option>
                            <option value='pending'>Pending</option>
                        </select>
                        <button type='submit'>Update Status</button>
                    </form>
                </li>";
        }
        echo "</ul>";
    } else {
        echo "No loan requests found.";
    }

    $conn->close();
?>

</body>
</html>
