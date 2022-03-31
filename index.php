<?php

// Including init file
require "bootstrap/init.php";

// Getting a specific inserted location
$location = false;
if (isset($_GET['location']) && is_numeric($_GET['location'])) {
    $location = Get_location($_GET['location']);
}

// Including template file of index.php
require "tpl/tpl-index.php";
