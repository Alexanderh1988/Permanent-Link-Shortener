<?php

//local:
//$db = mysqli_connect('127.0.0.1', 'root', '', 'testdata');
//remoto
$db = mysqli_connect('localhost', 'chs44206_hstech', 'k5m5[1vP^~ZD', 'chs44206_dbhstech');

// Check if ID is provided via POST
if (isset($_GET['ID'])) {

    $CODE = $_GET['ID'];

    // Prepare and execute SQL select statement
    $stmt = $db->prepare("SELECT link FROM linkshortener WHERE CODE = ?");
    $stmt->bind_param("s", $CODE);
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($link);
	
	echo $link;

    // Fetch the link
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Redirect to the link if found
    if (!empty($link)) {
        header('Location: ' . $link);
        exit;
    } else {
        echo "Link not found!";
    }
}

// Close the database connection
$db->close();
?>
