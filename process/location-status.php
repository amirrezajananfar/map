<?php

// Including init file
require '../bootstrap/init.php';

// Checking if request ajax
if (!Is_Ajax_request()) {
    Die_page('نوع درخواست معتبر نمی باشد');
}

// Checking if sent data valid
if (is_null($_POST['location_id']) && !is_numeric($_POST['location_id'])) {
    echo "مکان نامعتبر می باشد.";
    die();
}

// Calling a function to change the verify status of selected location
echo Change_Location_status($_POST['location_id']);
