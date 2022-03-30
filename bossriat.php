<?php

// Including init file
require "bootstrap/init.php";

// Checking if admin wants to logout
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    logout();
}

// Checking if login form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // getting sent data as a variable
    $admin_email = $_POST['admin-email'];
    $admin_password = $_POST['admin-password'];
    // Checking if user logging in
    if (!login($admin_email, $admin_password)) {
        // Show a simple error about login's problem
        Fail_msg('اطلاعات وارد شده صحیح نمی باشد.');
    }
}

// Including template file of admin.php & login.php
if (Is_Logged_in()) {
    // Checkin if GET parameters set to get the locations
    $params = $_GET ?? [];
    $locations = Get_locations($params);
    include "tpl/tpl-bossriat.php";
} else {
    include "tpl/tpl-bossriat-login.php";
}
