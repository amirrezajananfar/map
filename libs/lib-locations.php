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

// Declaring a function to get & show submitted locations from database
function Get_locations($params = [])
{
    global $pdo;
    $verify_condition = '';
    // Checking which status admin wants to check
    if (isset($params['verified']) && in_array($params['verified'], ['0', '1'])) {
        // If the condition was true this code will be added at end of the SQL query
        $verify_condition = " WHERE verified = {$params['verified']}";
    }
    $sql = "SELECT * FROM locations $verify_condition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
