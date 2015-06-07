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
                $id=$_SESSION['id'];
                $data=mysqli_query($dbc,$query);
                $row=mysqli_fetch_array($data);
                $pro_pic=$row['pro_pic'];
                $name=$row['first_name']." ".$row['last_name'];
                $twitter=$row['twitter'];
            ?>
            <div id="profile-line">
                <div id="profile-button" style="background:url('<?php echo $up.'/'.$pro_pic; ?>'); background-size:cover;"></div>
                <div id="profile-details">
                    <h2><?php echo $name; ?></h2>
                    <h4 style="margin-top:-5px; font-weight:100;"><?php echo $twitter;?></h4>
                </div>
            </div>
            
            
           
            <div class="container-new" style="margin-top:-80px; background:#FFF; border-radius:10px;">
                <?php
                $query='SELECT * FROM main_post WHERE user="'.$id.'"';
                $data=mysqli_query($dbc,$query);
                    while($row=mysqli_fetch_array($data))
                    {
                        echo '<h4 style="color:#009688;">'.$row['title'].'</h4>';
                    }
                ?>

            </div>
            
            <?php
            }
                ?>
        </div>

<?php require_once('footer.php');?>