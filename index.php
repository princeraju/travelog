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
            <a href="add_new.php">Add New</a>
        </div>

<?php require_once('footer.php');?>