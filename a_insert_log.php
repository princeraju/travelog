<?php 
    require_once('pw_for_travelog.php');
    $user=$_SESSION['id'];
    $title=$_POST['title'];
    $des=nl2br(mysql_real_escape_string($_POST['des']));
    $date=$_POST['date'];
    $id=$_POST['id_journey'];
$query='INSERT INTO `logs`(`id`, `user_id`, `id_journey`, `title`, `time`, `des`) VALUES ("'.uniqid().'","'.$user.'","'.$id.'","'.$title.'","'.$date.'","'.$des.'")';
if(mysqli_query($dbc,$query))
{   echo 'Save';
}
else
{
    echo 'Try Again';
}
?>