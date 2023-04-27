
<?php
define("URL","http://localhost/registration_php_/");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_SESSION['page'];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary ">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
    <?php if(isset($_SESSION['login']) && $_SESSION['login'] == true):?>
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo URL?>home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo URL?>handelers/logout.php">logout</a>
        </li>
    <?php else:?>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo URL?>register.php">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo URL?>login.php">login</a>
        </li>
    <?php endif;?>
</ul>

            </div>
        </div>
    </nav>