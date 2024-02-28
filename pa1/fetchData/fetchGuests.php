<?php
require 'connectDB.php'; // Include database connection
try{
    // prepare statement for executions. This part needs to change for every query
    $stmt = $conn->prepare("SELECT first_name, last_name FROM guests where age>=$ageLimit");

    // execute statement
    $stmt->execute();

    // set the resulting array to associative. 
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // destroy our connection
    $conn = null;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
