<?php 
    $title="Sample";
    require_once('pw_for_travelog.php');
?>

<?php
    require_once('header.php'); 
?>

        <div class="container">
            <?php
                echo $_SESSION['email'];
            ?>
        </div>

<?php require_once('footer.php');?>