<?php

// Declaring a function to check if a submitted location exist
function Check_Exist_location($submitted_lat, $submitted_lng)
{
    global $pdo;
    $sql = "SELECT * FROM locations WHERE lat like $submitted_lat AND lng like $submitted_lng";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

// Declaring a function to insert submitted location into database
function Add_location($submitted_lat, $submitted_lng, $submitted_title, $submitted_type)
{
    global $pdo;
    $sql = "INSERT INTO locations (title, lat, lng, type) VALUES (:title, :lat, :lng, :type)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title' => $submitted_title, ':lat' => $submitted_lat, 'lng' => $submitted_lng, ':type' => $submitted_type]);
    return $stmt->rowCount();
}
