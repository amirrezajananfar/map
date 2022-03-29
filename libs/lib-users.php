<?php

// Declaring a function to check is admin logged in
function Is_Logged_in()
{
    return isset($_SESSION['login']); // If isset return true
}

// Declaring a function to login admin
function login($useremail, $userpassword)
{
    global $admins;
    if (array_key_exists($useremail, $admins)
        // Checking sent data is set & correct
        && password_verify($userpassword, $admins[$useremail])
    ) {
        $_SESSION['login'] = 1; // Setting a session to login the admin
        return true;
    }
    return false;
}

// Declaring a function to logout admin
function logout()
{
    unset($_SESSION['login']); // Unsetting the login session
}
