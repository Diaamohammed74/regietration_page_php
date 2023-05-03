<?php session_start();?>
<?php $_SESSION['title']='Home';?>
<?php
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
?>
<?php include "layout/header.php"?>
<?php include "alerts/alerts.php"?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?php if (isset($_SESSION['success'])): ?>
            <?php   alert_message('success','success'); ?>
            <?php endif; ?>
            <?php welcome_message('username')?>
        </div>
    </div>
</div>

<?php include "layout/footer.php"?>