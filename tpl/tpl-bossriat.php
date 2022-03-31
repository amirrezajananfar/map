<?php
// Using verta package for persian date & time format
use Hekmatinasser\Verta\Verta; ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo Site_url('assets/css/styles.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <title><?php echo Program_title('پنل مدیریت') ?></title>
</head>

<body class="my-bg-secondary">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 mx-auto my-5">
                <div class="text-center py-2 mb-4">
                    <a href="<?php echo Site_url('bossriat.php') ?>" class="text-decoration-none">
                        <h3 class="fw-bolder black-font-text text-body">پنل مدیریت
                            <span class="text-primary black-font-text">نقشه آنلاین</span>
                        </h3>
                    </a>
                </div>
                <div class="bg-light rounded shadow-sm my-3 px-2 py-3">
                    <div class="row">
                        <div class="col">
                            <div class="float-end">
                                <a class="bg-primary rounded py-1 px-2 my-pointer-cursor my-primary-bg-hover text-decoration-none mx-2" href="<?php echo Site_url() ?>" target="_blank">
                                    <span class="text-light me-1">
                                        <i class="bi bi-house-fill"></i>
                                        صفحه اصلی
                                    </span>
                                </a>
                                <a class="bg-warning rounded py-1 px-2 my-pointer-cursor my-warning-bg-hover text-decoration-none mx-2" href="?verified=all">
                                    <span class="text-light">
                                        <i class="bi bi-clipboard-fill"></i>
                                        همه مکان ها
                                    </span>
                                </a>
                                <a class="bg-success rounded py-1 px-2 my-pointer-cursor my-success-bg-hover text-decoration-none mx-2" href="?verified=1">
                                    <span class="text-light">
                                        <i class="bi bi-clipboard-check-fill"></i>
                                        مکان های فعال
                                    </span>
                                </a>
                                <a class="bg-secondary rounded py-1 px-2 my-pointer-cursor my-secondary-bg-hover text-decoration-none mx-2" href="?verified=0">
                                    <span class="text-light">
                                        <i class="bi bi-clipboard2-minus-fill"></i>
                                        مکان های غیر فعال
                                    </span>
                                </a>
                            </div>
                            <div class="float-start">
                                <a class="bg-danger rounded py-1 px-2 my-pointer-cursor my-danger-bg-hover text-decoration-none mx-2" href="?logout=1">
                                    <span class="text-light">
                                        <i class="bi bi-door-open-fill"></i>
                                        خروج
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded shadow-sm p-3 my-3">
                    <div class="modal fade" id="preview-location-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body" style="height: 500px;">
                                    <iframe src="#" id="preview-location" class="w-100 h-100 rounded" frameborder="0"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">بستن</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">عنوان مکان</th>
                                <th scope="col">تاریخ ثبت</th>
                                <th scope="col">عرض جغرافیایی</th>
                                <th scope="col">طول جغرافیایی</th>
                                <th scope="col">وضعیت نمایش</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($locations as $location) : ?>
                                <?php $date = Verta::instance($location->created_at); ?>
                                <tr class="text-center">
                                    <td><?php echo $location->title ?></td>
                                    <td><?php echo $date->format('%d %B %Y'); ?></td>
                                    <td><?php echo $location->lat ?></td>
                                    <td><?php echo $location->lng ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-<?php echo $location->verified ? 'success' : 'secondary' ?> sw-btn" data-location="<?php echo $location->id ?>">
                                            تایید
                                        </button>
                                        <button class="btn btn-sm btn-primary preview" data-location="<?php echo $location->id ?>">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Declaring some js functions
        $(document).ready(function() {
            // Declaring a function to show map preview in admin panel
            $('.preview').click(function() {
                $('#preview-location-modal').modal('show');
                $('#preview-location').attr('src', '<?php echo Site_url() ?>?location=' + $(this).attr('data-location'));
            });
            // Declaring a function to change the verify status of a location via ajax
            $('.sw-btn').click(function() {
                const button = $(this);
                const location_id = button.attr('data-location');
                $.ajax({
                    url: "<?php echo Site_url('process/location-status.php') ?>",
                    method: 'POST',
                    data: {
                        location_id: location_id
                    },
                    success: function(response) {
                        // Defining what must be happen, depending to response
                        if (response == 1) {
                            // Switching between two classes
                            button.toggleClass('btn-success btn-secondary')
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>