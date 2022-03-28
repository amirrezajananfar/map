<?php

// Including init file
require '../bootstrap/init.php';

// Checking if request ajax
if (!Is_Ajax_request()) {
    Die_page('نوع درخواست معتبر نمی باشد');
}

// Getting & defining sent data as special variables
$submitted_lat = (float) $_POST['lat'];
$submitted_lng = (float) $_POST['lng'];
$submitted_title = $_POST['location-name'];
$submitted_type = (int) $_POST['location-type'];

// Declaring some code to avoiding of hard code
$danger_class = "class='alert alert-danger text-center mt-3'"; // Declaring bootstrap 5 alert classes
$undefined_type = "نوع مکان معتبر نمی باشد"; // Declaring undefined type error message

// Validating submitted data
if (!is_float($submitted_lat) && !is_float($submitted_lng)) { // Checking if lat & lng are double
    echo "<div $danger_class>مقادیر طول و عرض جغرافیایی معتبر نمی باشد</div>";
    die();
}
if (empty($submitted_title) && strlen($submitted_title) < 1) { // Cheking if the location's name inserted
    echo "<div $danger_class>لطفا نام مکان انتخابی را بنویسید</div>";
    die();
}
if (!is_string($submitted_title)) { // Checking if the location's name is string
    echo "<div $danger_class>نام مکان مدنظر معتبر نمی باشد</div>";
    die();
}
if (strlen($submitted_type) < 1) { // Checking if the location's type inserted
    echo "<div $danger_class>$undefined_type</div>";
    die();
}
if (!is_int($submitted_type)) { // Checking if submitted type is int
    echo "<div $danger_class>$undefined_type</div>";
    die();
}
if ($submitted_type > 8 || $submitted_type < 0) { // Checking if submitted type is between 0 and 8
    echo "<div $danger_class>$undefined_type</div>";
    die();
}
if (Check_Exist_location($submitted_lat, $submitted_lng)) { // Checking if submitted location is duplicative
    echo "<div $danger_class>این مکان قبلا ثبت شده است</div>";
    die();
}

// Calling add location function to submit data into database
if (Add_location($submitted_lat, $submitted_lng, $submitted_title, $submitted_type)) {
    echo "<div class='alert alert-success text-center mt-3'>ثبت مکان انجام شد و در انتظار تایید مدیر می باشد!</div>";
} else {
    echo "<div $danger_class>متاسفانه در روند ثبت مکان خطایی رخ داده است!</div>";
    die();
}
