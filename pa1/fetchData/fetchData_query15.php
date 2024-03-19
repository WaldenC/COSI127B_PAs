<?php
require 'connectDB.php'; // Include database connection
try{
    $stmt = $conn->prepare("SELECT 
            p1.name AS actor_1, 
            p2.name AS actor_2, 
            p1.dob AS common_birthday
        FROM 
            people p1
        JOIN 
            people p2 ON p1.dob = p2.dob AND p1.id != p2.id
        JOIN 
            role r1 ON p1.id = r1.pid
        JOIN 
            role r2 ON p2.id = r2.pid
        WHERE 
            r1.role_name = 'Actor' AND r2.role_name = 'Actor'
        GROUP BY 
            p1.name, p2.name, p1.dob
        HAVING 
            p1.name < p2.name;
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
