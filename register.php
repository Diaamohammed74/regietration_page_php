<?php session_start();?>
<?php 
if (isset($_SESSION['login']))
{
    header("location: home.php");
}
?>
<?php $_SESSION['title']='Register';?>
<?php include "layout/header.php"?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?php if (isset($_SESSION['errors'])):?>
            <?php foreach($_SESSION['errors'] as $error):?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error;?>
            </div>
            <?php endforeach;?>
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
                    <input type="name" name="name" class="form-control" value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : ' ';?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : ' ';?>">
                </div>
                <?php unset($_SESSION['errors']);?>
                <?php unset($_SESSION['email']);?>
                <?php unset($_SESSION['name']);?>
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