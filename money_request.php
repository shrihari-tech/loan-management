<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Request Form</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: blue;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Money Request Form</h2>

<form id="moneyRequestForm" method="POST" action="process_money_request.php">
    <label for="borrower">Select Borrower:</label>
    <select id="borrower" name="borrower">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blitzwork";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT name FROM borrower");
            
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['name']."'>".$row['name']."</option>";
            }

            $conn->close();
        ?>
    </select>

    <label for="lender">Select Lender:</label>
    <select id="lender" name="lender">
        <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT name FROM lender");
            
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['name']."'>".$row['name']."</option>";
            }

            $conn->close();
        ?>
    </select>

    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" required>

    <button type="submit">Submit Request</button>
</form>

</body>
</html>
