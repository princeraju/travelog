<?php 
    require_once('pw_for_travelog.php');
    $user=$_SESSION['id'];
    $title=$_POST['title'];
    $intro=$_POST['intro'];
    $image=$_POST['image'];
    $unique=uniqid();
$query='INSERT INTO `main_post`(`id`, `title`, `intro`, `user`, `image`) VALUES ("'.$unique.'","'.$title.'","'.$intro.'","'.$user.'","'.$image.'")';
if(mysqli_query($dbc,$query))
    echo 'Saved';
else
    echo 'Try Again';
?>