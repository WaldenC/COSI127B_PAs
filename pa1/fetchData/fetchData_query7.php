<?php
require 'connectDB.php'; // Include database connection
try{
    // prepare statement for executions. This part needs to change for every query
    // $stmt = $conn->prepare("SELECT actor_name, age_at_award
    // FROM (
    //     SELECT p.name AS actor_name, 
    //            a.award_year - YEAR(p.dob) AS age_at_award
    //     FROM people p
    //     JOIN award a ON p.id = a.pid
    //     JOIN role r ON p.id = r.pid AND a.mpid = r.mpid
    //     WHERE (r.role_name = 'Actor' OR r.role_name = 'Actress') AND a.award_name IS NOT NULL
    // ) AS subquery
    // WHERE age_at_award = (SELECT MIN(age_at_award) FROM subquery)
    //    OR age_at_award = (SELECT MAX(age_at_award) FROM subquery);
    // ");

    $stmt = $conn->prepare("SELECT actor_name, age_at_award
    FROM (
        SELECT DISTINCT p.name AS actor_name, 
               a.award_year - YEAR(p.dob) AS age_at_award
        FROM people p
        JOIN award a ON p.id = a.pid
        JOIN role r ON p.id = r.pid AND a.mpid = r.mpid
        WHERE (r.role_name = 'Actor' OR r.role_name = 'Actress') AND a.award_name IS NOT NULL
    ) AS subquery
    WHERE age_at_award = (
        SELECT MIN(age_at_award)
        FROM (
            SELECT a.award_year - YEAR(p.dob) AS age_at_award
            FROM people p
            JOIN award a ON p.id = a.pid
            JOIN role r ON p.id = r.pid AND a.mpid = r.mpid
            WHERE (r.role_name = 'Actor' OR r.role_name = 'Actress') AND a.award_name IS NOT NULL
        ) AS subquery_min
    )
    OR age_at_award = (
        SELECT MAX(age_at_award)
        FROM (
            SELECT a.award_year - YEAR(p.dob) AS age_at_award
            FROM people p
            JOIN award a ON p.id = a.pid
            JOIN role r ON p.id = r.pid AND a.mpid = r.mpid
            WHERE (r.role_name = 'Actor' OR r.role_name = 'Actress') AND a.award_name IS NOT NULL
        ) AS subquery_max
    );
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
