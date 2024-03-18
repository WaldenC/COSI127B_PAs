<?php
require 'connectDB.php'; // Include database connection

// we want to check if the submit button has been clicked (in our case, it is named Query)
if(isset($_POST['viewMotionPictures_byName']))
{
    // set age limit to whatever input we get
    // ideally, we should do more validation to check for numbers, etc. 
    $motionPicture = $_POST["motionPictureName"]; 
    $query = "SELECT name, production, budget, rating FROM motion_picture WHERE name = '$motionPicture'";
    // prepare statement for executions. This part needs to change for every query
    $stmt = $conn->prepare($query);
} else if(isset($_POST['viewMotionPictures_byEmail'])) {
    $user_email = $_POST["user_email"];
    $query = "SELECT m.name, m.rating, m.production, m.budget
                FROM motion_picture m
                JOIN likes l ON m.id = l.mpid
                JOIN user u ON l.uemail = u.email
                WHERE u.email = '$user_email'";
    $stmt = $conn->prepare($query);
} 
else
{
    // if the button was not clicked, we can simply set age limit to 0 
    // in this case, we will return everything
    $query = "SELECT id, name, production, budget, rating FROM motion_picture";
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
