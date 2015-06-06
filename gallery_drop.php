        
        <div class="gallery_drop">
            <img class="image_holder" src="images/add_new_photo.png" loc="null">
            <?php
                $query="SELECT * FROM pics";
                $data=mysqli_query($dbc, $query);
                while($row=mysqli_fetch_array($data))
                {
                    ?>
                            <img class="image_holder" src="<?php echo $up.'/thumb_'.$row['href'];?>" loc="<?php echo $row['href']?>">
            <?php
                    
                }
            ?>
        </div>