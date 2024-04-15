<?php

//local:
//$db = mysqli_connect('127.0.0.1', 'root', '', 'testdata');
//remoto
$db = mysqli_connect('localhost', 'chs44206_hstech', 'k5m5[1vP^~ZD', 'chs44206_dbhstech');

// Check connection 		
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Retrieve the text from the POST data
if(isset($_GET['link']) && isset($_GET['ID'])){
    $link = $_GET['link'];
    $ID = $_GET['ID'];

    // Prepare and execute SQL insert statement with prepared statements
    $stmt = $db->prepare("INSERT INTO linkshortener (link, CODE) VALUES (?, ?)");
    $stmt->bind_param("ss", $link, $ID);

    if ($stmt->execute()) {
        echo "Insertado correctamente.";
    } else {
        echo "Error insertando: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Se requiere URL.";
}

$db->close();
?>
