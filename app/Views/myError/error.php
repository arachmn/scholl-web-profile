<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>Error Page</title>

    <!-- favicon -->
    <link rel="apple-touch-icon" type="image/png" href="https://cdn.fabian.lol/logos/favicon.png" />
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.fabian.lol/logos/favicon.png">
    <link rel="shortcut icon" href="https://cdn.fabian.lol/logos/favicon.png">
    <link rel="icon" type="image/png" href="https://cdn.fabian.lol/logos/favicon.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://cdn.fabian.lol/logos/favicon.png" sizes="96x96">

    <!-- import CSS -->
    <link rel="stylesheet" href="https://error-pages.fabian.lol/assets/css/style.min.css">

    <!-- import fontawesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1><span class="normal">Error </span><span class="text"><?= $errorCode ?></span></h1>
        <p><?= $message ?></p>
        <a href="<?= site_url() ?>" class="btn-big btn-primary"><i class="fas fa-hand-point-left"></i> go back</a>
    </div>
    <!-- import JS -->
    <script src="https://error-pages.fabian.lol/assets/js/app.min.js"></script>
</body>

</html>