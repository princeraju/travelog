<?php
    require('pw_for_travelog.php');
$param=$_POST['param'];
$type=$_POST['type'];
$finished=0;
while($finished==0)
{
    if($param="http://www.kallunkal.com/Test%20audio.m4a")
    {
        $param="usw3p_ff13f476-c154-4a9f-8f3d-57f95d12a66d";
        require('decode_hpjob.php');
        $type=1;
        echo $new;
        $finished++;
    }
    else if($type==0)
    {
        require('get_hpjob.php');
        $type=1;
        $param=$new;
    }
    else if($type==1)
    {
        require('decode_hpjob.php');
        echo $new;
        $finished++;
    }
    
}

?>