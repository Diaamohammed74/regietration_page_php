<?php session_start();?>
<?php $_SESSION['page']='Login';?>
<?php include "layout/header.php"?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
        <div class="alert alert-info" role="alert" style="text-align: center;">
                <h3>LOGIN</h3>
            </div>
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

            <form class="border p-4" action="handelers/login.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="submit" class="form-control btn btn-primary">LOGIN</button>
            </form>
        </div>
    </div>
</div>
<?php include "layout/footer.php"?>