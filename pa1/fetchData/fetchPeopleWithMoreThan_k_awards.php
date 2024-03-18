<?php
require 'connectDB.php'; // Include database connection

// we want to check if the submit button has been clicked (in our case, it is named Query)
if(isset($_POST['viewPeople_moreThan_k_awards']))
{
    // set age limit to whatever input we get
    // ideally, we should do more validation to check for numbers, etc. 
    $awardCount = $_POST["awardCount"]; 
    $query = "SELECT p.name AS person_name, 
              mp.name AS motion_picture_name, 
              a.award_year, 
              COUNT(a.award_name) AS award_count
              FROM people p
              JOIN award a ON p.id = a.pid
              JOIN motion_picture mp ON a.mpid = mp.id
              GROUP BY p.id, mp.id, a.award_year
              HAVING COUNT(a.award_name) > $awardCount";
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
