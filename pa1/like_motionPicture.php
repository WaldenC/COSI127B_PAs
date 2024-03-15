<?php
session_start();
require 'connectDB.php'; 

if (isset($_POST['like'])) {
    $userEmail = $_POST['user_email'];
    $motionPicture_id = $_POST['motionPicture_id'];

    // check if the user exists
    $stmt = $conn->prepare("SELECT email FROM User WHERE email = ?");
    $stmt->execute([$userEmail]);
    if ($stmt->rowCount() == 0) {
        $_SESSION['message'] = "User does not exist.";
        header('Location: index.php'); // redirect back to the original page
        exit();
    } else {
        // check if the user has already liked the motion picture
        $stmt = $conn->prepare("SELECT uemail FROM Likes WHERE uemail = ? AND mpid = ?");
        $stmt->execute([$userEmail, $motionPicture_id]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['message'] = "You have already liked this motion picture.";
            header('Location: index.php'); // redirect back to the original page
            exit();
        } else {
            // insert the like
            $stmt = $conn->prepare("INSERT INTO Likes (uemail, mpid) VALUES (?, ?)");
            $stmt->execute([$userEmail, $motionPicture_id]);
            $_SESSION['message'] = "Liked successfully!";
            header('Location: index.php'); // redirect back to the original page
            exit();
        }
    }
}
?>
