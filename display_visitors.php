<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Displaying Visitors</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
<?php

require_once 'login.php';

// Connect to MySQL Server
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Fetch data from visitors table
$query_visitors = "SELECT * FROM visitors";
$stmt = $pdo->query($query_visitors);

// Display data in a table
echo "<table>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>{$row['ID']}</td><td>{$row['Fname']}</td><td>{$row['Lname']}</td></tr>";
}

echo "</table>";

echo "<p><a href=\"GuestBookE1P2.php?action=view\">Add a Guest?</a></p>";

?>
</body>
</html>
