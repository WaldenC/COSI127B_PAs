<?php
require 'connectDB.php'; // Include database connection

// we want to check if the submit button has been clicked (in our case, it is named Query)
if(isset($_POST['viewQuery9']))
{
    // set age limit to whatever input we get
    // ideally, we should do more validation to check for numbers, etc. 
    $rating = $_POST["rating"]; 
    $query = "SELECT p.name AS person_name, 
                  mp.name AS motion_picture_name, 
                  COUNT(r.role_name) AS role_count
              FROM People p
              JOIN Role r ON p.id = r.pid
              JOIN MotionPicture mp ON r.mpid = mp.id
              WHERE mp.rating > $rating
              GROUP BY p.id, mp.id
              HAVING COUNT(r.role_name) > 1;
    ";
    // prepare statement for executions. This part needs to change for every query
    $stmt = $conn->prepare($query);
}

try{
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
