<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo Site_url('assets/css/styles.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <title><?php echo Program_title('ورود به حساب مدیریت') ?></title>
</head>
<body class="my-bg-secondary">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 mx-auto my-5">
                <div class="bg-light rounded shadow-sm my-3 px-2 py-3">
                    <div class="text-center py-2 mb-4">
                        <h4 class="fw-bolder black-font-text">ورود به حساب مدیریت</h4>
                    </div>
                    <div class="px-3">
                        <form action="bossriat.php" method="POST">
                            <div class="mb-4">
                                <label for="admin-emailexampleInputEmail1" class="form-label">آدرس ایمیل:</label>
                                <input type="email" class="form-control text-start" name="admin-email" id="admin-email" aria-describedby="email-help" placeholder="example@mail.com" autocomplete="off">
                                <div id="email-help" class="form-text">آدرس ایمیل خود را به صورت کامل بنویسید.</div>
                            </div>
                            <div class="mb-4">
                                <label for="admin-password" class="form-label">رمز عبور:</label>
                                <input type="password" class="form-control text-start" name="admin-password" id="admin-password" aria-describedby="password-help" placeholder="********" autocomplete="off">
                                <div id="password-help" class="form-text">رمز عبور حساب کاربری خود را بنویسید.</div>
                            </div>
                            <input type="submit" class="btn btn-primary w-100" value="ورود">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>