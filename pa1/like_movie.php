<?php
session_start();
require 'connectDB.php'; 

if (isset($_POST['like'])) {
    $userEmail = $_POST['user_email'];
    $movieId = $_POST['movie_id'];

    // check if the user exists
    $stmt = $conn->prepare("SELECT email FROM User WHERE email = ?");
    $stmt->execute([$userEmail]);
    if ($stmt->rowCount() == 0) {
        $_SESSION['message'] = "User does not exist.";
        header('Location: index.php'); // redirect back to the original page
        exit();
    } else {
        // check if the user has already liked the movie
        $stmt = $conn->prepare("SELECT uemail FROM Likes WHERE uemail = ? AND mpid = ?");
        $stmt->execute([$userEmail, $movieId]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['message'] = "You have already liked this movie.";
            header('Location: index.php'); // redirect back to the original page
            exit();
        } else {
            // insert the like
            $stmt = $conn->prepare("INSERT INTO Likes (uemail, mpid) VALUES (?, ?)");
            $stmt->execute([$userEmail, $movieId]);
            $_SESSION['message'] = "Liked successfully!";
            header('Location: index.php'); // redirect back to the original page
            exit();
        }
    }
}
?>
