<?php 
    $title="Login";
    require_once('pw_for_travelog.php');
?>
<?php
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $email=mysqli_real_escape_string($dbc,trim($_POST['email']));
            $password=mysqli_real_escape_string($dbc,trim($_POST['password']));
            $password=crypt($password,$pw_key);
            $query='SELECT * FROM users WHERE email="'.$email.'" AND password="'.$password.'"';
            $data=mysqli_query($dbc, $query);
            if(mysqli_num_rows($data)==1)
            {
                $row=mysqli_fetch_array($data);
                $_SESSION['first_name']=$row['first_name'];
                $_SESSION['last_name']=$row['last_name'];
                $_SESSION['id']=$row['id'];
                header('Location:index.php');
            }
            else
                $message="Invalid credentials";
        }
    }
?>
<?php
    require_once('header.php'); 
?>

        <div class="container">
            <div class="drop_top" style="display:block; margin-top:0px;">
                <div style="margin-top:50px;">
                    <?php
                        if(isset($message))
                            echo '<span>'.$message.'</span>'
                    ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input id="email" type="text" name="email" class="input_big" placeholder="email" autofocus required style="font-size:20px;" autocomplete="off">
                    <input id="password" type="password" name="password" class="input_big" placeholder="password" required style="font-size:20px;" autocomplete="off">
                    <input type="submit" id="submit" name="submit" value="log in" class="login_but">
                    </form>
                    
                </div>
                 
            </div>
            
            <div id="login_back"></div>
            <div>
                <img id="login_img" src="images/login_img.png">
            </div>
        </div>

<?php require_once('footer.php');?>