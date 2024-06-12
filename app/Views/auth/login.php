<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="<?= base_url('assets/auth/css/styles.css') ?>">

    <link href="<?= base_url('img/profile/' . $profile->logo) ?>" rel="icon">

    <title><?= $profile->name ?></title>
    <style>
        .alert {
            padding: 15px;
            border: 1px solid;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        /* Gaya untuk close button */
        .close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            line-height: 18px;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: 0.2;
        }

        .close:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="l-form">
        <form action="<?= site_url('AuthController/loginProccess') ?>" class="form" method="post">
            <?= csrf_field() ?>
            <?php if (session()->getFlashData('error')) : ?>
                <div class="alert alert-danger">
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Error!</strong> <?= session()->getFlashData('error') ?>
                </div>
            <?php endif ?>
            <h1 class="form__title">Sign In</h1>

            <div class="form__div">
                <input type="text" class="form__input" id="username" name="username" placeholder=" ">
                <label for="" class="form__label">Username</label>
            </div>

            <div class="form__div">
                <input type="password" class="form__input" id="password" name="password" placeholder=" ">
                <label for="" class="form__label">Password</label>
            </div>

            <input type="submit" class="form__button" value="Sign In">
        </form>
    </div>
</body>

</html>