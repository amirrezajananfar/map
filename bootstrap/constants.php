<?php

// Program title
define('PROGRAM_TITLE', 'نقشه آنلاین');

// Program base url
$program_uri_name = '/map/'; // It can be changed
$program_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $program_uri_name;
define('BASE_URL', $program_url);

// Program base url
$program_folder_name = '/map/'; // It can be changed
$program_path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . $program_folder_name;
define('BASE_PATH', $program_path);

// Declaring location types
const LOCATION_TYPES = [ // It can be more
    0 => "اداری",
    1 => "عمومی",
    2 => "تجاری",
    3 => "تفریحی",
    4 => "شرکت",
    5 => "آموزشگاه",
    6 => "رستوران",
    7 => "کافی شاپ",
    8 => "اقامتگاه",
];
