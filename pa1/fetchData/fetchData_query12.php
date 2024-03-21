<?php
require 'connectDB.php'; // Include database connection
try{
    $stmt = $conn->prepare("SELECT DISTINCT p.name AS actor_name, mp1.name AS marvel_movie_name, mp2.name AS warner_bros_movie_name
      FROM People p
      JOIN Role r1 ON p.id = r1.pid
      JOIN MotionPicture mp1 ON r1.mpid = mp1.id AND mp1.production = 'Marvel'
      JOIN Role r2 ON p.id = r2.pid
      JOIN MotionPicture mp2 ON r2.mpid = mp2.id AND mp2.production = 'Warner Bros'
      WHERE r1.role_name = 'Actor' AND r2.role_name = 'Actor'
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
