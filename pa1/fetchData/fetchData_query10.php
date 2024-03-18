<?php
require 'connectDB.php'; // Include database connection
try{
    $stmt = $conn->prepare("SELECT mp.name, mp.rating
    FROM motion_picture mp
    JOIN movie m ON mp.id = m.mpid
    JOIN genre g ON mp.id = g.mpid
    JOIN location l ON mp.id = l.mpid
    WHERE g.genre_name = 'thriller'
    AND l.city = 'Boston'
    AND NOT EXISTS (
        SELECT 1
        FROM location l2
        WHERE l2.mpid = mp.id AND l2.city <> 'Boston'
    )
    GROUP BY mp.id
    ORDER BY mp.rating DESC
    LIMIT 2;    
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
