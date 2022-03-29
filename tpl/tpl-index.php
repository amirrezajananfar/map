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
                <div class="my-z-index position-fixed w-100 m-2">
                    <input type="text" id="search" class="form-control p-2 border border-1 rounded w-25" placeholder="نام مکان مد نظر خود را بنویسید...">
                </div>
                <div class="position-fixed top-0 start-0 bottom-0 end-0">
                    <div id="my-map" class="position-relative h-100"></div>
                </div>
            </div>
            <div class="modal fade" id="submit-location-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ثبت موقعیت مکانی</h5>
                        </div>
                        <form action="<?php echo Site_url('process/add-location.php') ?>" id="add-location-form" method="POST">
                            <div class="modal-body">
                                <div class="row mb-4 d-none">
                                    <div class="col-sm-3">مختصات مکان:</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="lat" id="lat-display" class="form-control" readonly>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="lng" id="lng-display" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">نام مکان:</div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="location-name" id="location-name" placeholder="نام موقعیت مکانی مد نظر خود را دقیق بنویسید" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">نوع مکان:</div>
                                    <div class="col-sm-9">
                                        <select name="location-type" id="location-type" class="form-select">
                                            <?php foreach (LOCATION_TYPES as $type_key => $type_name) : ?>
                                                <option value="<?php echo $type_key ?>">
                                                    <?php echo $type_name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="result"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                <input type="submit" class="btn btn-primary" value="ثبت مکان">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>
    <script src="<?php echo Site_url('assets/js/scripts.js') ?>" type="text/javascript"></script>
</body>

</html>