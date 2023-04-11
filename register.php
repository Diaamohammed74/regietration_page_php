<?php session_start();?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?php if (isset($_SESSION['errors'])):?>
            <?php foreach($_SESSION['errors'] as $error):?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error;?>
            </div>
            <?php endforeach;?>
            <?php unset($_SESSION['errors']);?>
            <?php endif;?>
            <?php if (isset($_SESSION['success'])):?>
            <?php foreach($_SESSION['success'] as $success):?>
            <div class="alert alert-success" role="alert">
                <?php echo $success;?>
            </div>
            <?php endforeach;?>
            <?php unset($_SESSION['success']);?>
            <?php endif;?>
            <div class="alert alert-info" role="alert" style="text-align: center;">
                <h3>Register Now</h3>
            </div>
            <form class="border p-4" action="handelers/register.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Username</label>
                    <input type="name" name="name" class="form-control" id="exampleInputName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="form-control btn btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>