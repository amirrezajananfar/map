<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo Site_url('assets/css/styles.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <title><?php echo Program_title() ?></title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="search-box position-fixed w-100 m-2">
                    <input type="text" id="search" class="form-control p-2 border border-1 rounded w-25" placeholder="نام مکان مد نظر خود را بنویسید...">
                </div>
                <div class="position-fixed top-0 start-0 bottom-0 end-0">
                    <div id="my-map" class="position-relative h-100"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>
    <script src="<?php echo Site_url('assets/js/scripts.js') ?>" type="text/javascript"></script>
</body>

</html>