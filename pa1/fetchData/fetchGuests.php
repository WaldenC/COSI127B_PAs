<?php
require 'connectDB.php'; // Include database connection

// we want to check if the submit button has been clicked (in our case, it is named Query)
if(isset($_POST['viewGuests_byAge']))
{
    // set age limit to whatever input we get
    // ideally, we should do more validation to check for numbers, etc. 
$ageLimit = $_POST["inputAge"]; 
}
else
{
    // if the button was not clicked, we can simply set age limit to 0 
    // in this case, we will return everything
    $ageLimit = 0;
}

try{
    // prepare statement for executions. This part needs to change for every query
    $stmt = $conn->prepare("SELECT first_name, last_name FROM guests where age>=$ageLimit");

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
