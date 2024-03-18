<?php
require 'connectDB.php'; // Include database connection

// we want to check if the submit button has been clicked (in our case, it is named Query)
if(isset($_POST['viewProducers_byCollectionAndBudget']))
{
    // set age limit to whatever input we get
    // ideally, we should do more validation to check for numbers, etc. 
    $minCollection = $_POST["minCollection"]; 
    $maxBudget = $_POST["maxBudget"];
    $query = "SELECT p.name AS producer_name, 
                mp.name AS movie_name, 
                m.boxoffice_collection, 
                mp.budget
            FROM people p
            JOIN role r ON p.id = r.pid
            JOIN motion_picture mp ON r.mpid = mp.id
            JOIN movie m ON mp.id = m.mpid
            WHERE r.role_name = 'Producer'
            AND p.nationality = 'USA'
            AND m.boxoffice_collection >=  $minCollection
            AND mp.budget <= $maxBudget;
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
