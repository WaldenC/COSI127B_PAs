<?php
require 'connectDB.php'; // Include database connection

// we want to check if the submit button has been clicked (in our case, it is named Query)
if(isset($_POST['viewDirectorAndSeries_byZipcode']))
{
    // set age limit to whatever input we get
    // ideally, we should do more validation to check for numbers, etc. 
    $zipcode = $_POST["zipcode"]; 
    $query = "SELECT DISTINCT p.name AS director_name, mp.name AS series_name
            FROM People p
            JOIN Role r ON p.id = r.pid
            JOIN Series s ON r.mpid = s.mpid
            JOIN MotionPicture mp ON s.mpid = mp.id
            JOIN Location l ON mp.id = l.mpid
            WHERE r.role_name = 'Director'
            AND l.zip = $zipcode";
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
