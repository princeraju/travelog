<?php 
    $title="Login";
    require_once('pw_for_travelog.php');
?>

<?php
    require_once('header.php'); 
?>

        <div class="container">
            <div class="drop_top">
                <div style="margin-top:50px;">
                    <form method="post">
                    <input type="text" class="input_big" placeholder="email" autofocus required style="font-size:20px;">
                    <input type="password" class="input_big" placeholder="password" required style="font-size:20px;">
                    <input type="submit" value="log in" class="login_but">
                    </form>
                </div>
                 
            </div>
            
            <div id="login_back"></div>
            <div>
                <img id="login_img" src="images/login_img.png">
            </div>
        </div>

<?php require_once('footer.php');?>