<?php session_start();?>
<?php $_SESSION['title']='Home';?>

<?php
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
?>
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
            <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])):?>
            <div class="alert alert-primary" role="alert">
                <?php echo "Welcome, " . $_SESSION['username'] . "!";?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>

<?php include "layout/footer.php"?>