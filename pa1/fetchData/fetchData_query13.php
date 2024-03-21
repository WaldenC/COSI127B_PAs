<?php
require 'connectDB.php'; // Include database connection
try{
    $stmt = $conn->prepare("SELECT mp.name, mp.rating
    FROM MotionPicture mp
    WHERE mp.rating > (
        SELECT AVG(mp2.rating) 
        FROM MotionPicture mp2
        JOIN Genre g ON mp2.id = g.mpid
        WHERE g.genre_name = 'Comedy'
    )
    ORDER BY mp.rating DESC;
    ");
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
