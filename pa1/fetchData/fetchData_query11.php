<?php
require 'connectDB.php'; // Include database connection

// we want to check if the submit button has been clicked (in our case, it is named Query)
if(isset($_POST['viewMovies_byLikesAndAge']))
{
    // set age limit to whatever input we get
    // ideally, we should do more validation to check for numbers, etc. 
    $minLikes = $_POST["minLikes"]; 
    $maxAge = $_POST["maxAge"];
    $query = "SELECT mp.name AS movie_name, 
                  COUNT(*) AS likes_count
              FROM MotionPicture mp
              JOIN Movie m ON mp.id = m.mpid
              JOIN Likes l ON mp.id = l.mpid
              JOIN User u ON l.uemail = u.email
              WHERE u.age < $maxAge
              GROUP BY mp.id
              HAVING COUNT(*) > $minLikes;";
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
