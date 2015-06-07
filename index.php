<?php 
    $title="Sample";
    require_once('pw_for_travelog.php');
?>

<?php
    require_once('header.php'); 
    require_once('navtab.php');
?>

        <div class="container">
            <?php
            if(isset($_SESSION['id']))
            {
                $query='SELECT * FROM users WHERE id="'.$_SESSION['id'].'"';
                $data=mysqli_query($dbc,$query);
                $row=mysqli_fetch_array($data);
                $pro_pic=$row['pro_pic'];
            ?>
            <div id="profile-line">
                <div id="profile-button" style="background:url('<?php echo $up.'/'.$pro_pic; ?>'); background-size:cover;"></div>
            </div>
            
            
            <?php
            }
                ?>
        </div>

<?php require_once('footer.php');?>