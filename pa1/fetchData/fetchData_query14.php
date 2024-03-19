<?php
require 'connectDB.php'; // Include database connection
try{
    $stmt = $conn->prepare("SELECT mp.name AS movie_name, 
            COUNT(DISTINCT p.id) AS people_count,
            COUNT(r.role_name) AS role_count
        FROM 
            motion_picture mp
        JOIN
            movie m ON mp.id = m.mpid
        JOIN 
            role r ON mp.id = r.mpid
        JOIN 
            people p ON r.pid = p.id
        GROUP BY 
            mp.id
        ORDER BY 
            people_count DESC, 
            role_count DESC
        LIMIT 5;
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
