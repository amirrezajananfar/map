<?php

// Including init file
require '../bootstrap/init.php';

// Checking if request ajax
if (!Is_Ajax_request()) {
    Die_page('نوع درخواست معتبر نمی باشد');
}

// Setting a variable for sen data via post method
$keyword = $_POST['keyword'];

// Check if sent data set & sent
if (!isset($keyword) || empty($keyword)) {
    die();
}

// Getting searched locations
$locations = Get_locations(['keyword' => $keyword]);
foreach ($locations as $location) {
    echo "
        <a href='?location=$location->id' class='text-decoration-none text-muted'>
            <div class='my-pointer-cursor search-result-bg-hover rounded m-1 px-1 py-2' data-lat='$location->lat' data-lng='$location->lat' data-location='$location->id'>
                <span class='bg-primary text-light rounded px-1 ms-2'>" . LOCATION_TYPES[$location->type] . "</span>
                <span>$location->title</span>
            </div>
        </a>
    ";
}
