<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Add Visitor</title>
    <style type="text/css">
        label { width: 5em; float: left; }
        .error { color: #ff0000; font-weight: bold; border: 0px none; }
    </style>
</head>
<body>
<?php

require_once 'login.php';

$displayForm = true;
$inputError = false;

// Connect to MySQL Server
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//===========================================================================
$first_name = "";
$last_name = "";
$firstname_error = "";
$lastname_error = "";

//===========================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['fname'];
    if (empty($first_name))
        $firstname_error = "The First Name is required";
    $last_name = $_POST['lname'];
    if (empty($last_name))
        $lastname_error = "The Last Name is required";

    if (!empty($firstname_error) || !empty($lastname_error))
        $inputError = true;

    //===========================================================================
    if ($inputError == false) {
        //Write your code below to insert into the visitors with a confirmation message if insert was successful:
        $query_visitors = "INSERT INTO visitors (fname, lname) VALUES (?, ?)";

        // Use prepared statements to prevent SQL injection
        $stmt = $pdo->prepare($query_visitors);
        $stmt->execute([$first_name, $last_name]);

        echo "<h2>Visitor was successfully added</h2>";
        
        $displayForm = false;
    }
}

//===========================================================================
if ($displayForm) {
    ?>
    <p>Use the following form to add a visitor to the visitors' database:</p>
    <form method="post" action="add_visitor.php">
        <p>First Name: </p>
        <p>
            <input type="text" name="fname" size="40" value="<?php echo $first_name; ?>">
            &nbsp;<input type="text" id="fname" class="error" size="40" value="<?php echo $firstname_error; ?>">
        </p>
        <p>Last Name: </p>
        <p>
            <input type="text" name="lname" size="40" value="<?php echo $last_name; ?>">
            &nbsp;<input type="text" id="lname_error" class="error" size="40" value="<?php echo $lastname_error; ?>">
        </p>
        <p>
            <input type="submit" name="addvisitor" value="Add Visitor" />&nbsp;&nbsp;
            <input type="reset" name="reset" value="Reset" />
        </p>
    </form>
<?php
}
?>
</body>
</html>
