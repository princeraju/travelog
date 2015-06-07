<?php 

require_once('pw_for_travelog.php');
if(!isset($_GET['id'])) 
    header('Location:index.php');

$id=$_GET['id'];
$query='SELECT * FROM main_post WHERE id="'.$id.'"';
$data=mysqli_query($dbc, $query);
if(mysqli_num_rows($data)!=1)
    header('Location:index.php');
$row=mysqli_fetch_array($data);

    $title=$row['title'];
    $image=$row['image'];
    $user_id=$row['user'];
    $intro=$row['intro'];
$query='SELECT twitter FROM users WHERE id="'.$user_id.'"';
$data=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($data);

    $twitter=$row['twitter'];
?>

<?php
    require_once('header.php'); 

?>
<?php require_once('navtab.php')?>
<?php require_once('gallery_drop.php');?>

<div class="main_img" style="background-size:cover; background:url('<?php echo $up.'/'.$image;?>')">
<div class="blacker"></div>
    <div class="title_main">
        <div style="font-size:20px;"><?php echo $twitter; ?></div>
        <?php echo $title; ?>
    </div>
</div>

<div class="container-new">
    <?php
        echo '<div style="line-height: 175%; margin-bottom:50px; padding-bottom:20px; border-bottom:1px solid;">'.$intro.'</div>';
    ?>
</div>
<table align="center">
<?php
$query='SELECT * FROM logs WHERE id_journey="'.$id.'" ORDER BY time ASC';
$data=mysqli_query($dbc,$query);
while($row=mysqli_fetch_array($data))
{
    echo '<tr>';
    echo '<td><h5 style="padding-right:20px;">'.convertDate($row['time']).'</h5></td>';
    echo '<td><img src="images/handle.png" width="300px"><span style="color:#009688; position:relative; top:-18px; padding-left:10px; font-weight:bold;">'.$row['title'].'</span></td>';
    echo '</tr>';
    echo '<tr style="margin-top:-50px;">';
    echo '<td></td>';
    echo '<td style="padding-left:300px; width:500px; line-height: 200%;">';
    echo $row['des'];
    echo '</td>';
    echo '</tr>';
}
?>
</table>

<?php require_once('footer.php');?>
<?php
function convertDate($date1) {
    $date1=explode('-',$date1);
    $date=$date1[2].'-'.$date1[1].'-'.$date1[0];
    return $date;
}
?>