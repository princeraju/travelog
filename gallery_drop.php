        
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

        <div class="drop_top" id="year" style="background:#009688; z-index:105;">
            <input type="text" id="year_hold" class="event" style="color:#FFF; font-size:30px; margin-top:70px; margin-left:150px;" maxlength="4" placeholder="year" >
        </div>
        <div class="drop_top" id="month" style="background:#009688;  z-index:106;">
            <br/><br/><br/>
            <button class="button2" value="01">Jan</button>
            <button class="button2" value="02">Feb</button>
            <button class="button2" value="03">Mar</button>
            <button class="button2" value="04">Apr</button>
            <button class="button2" value="05">May</button>
            <button class="button2" value="06">Jun</button>
            <button class="button2" value="07">Jul</button>
            <button class="button2" value="08">Aug</button>
            <button class="button2" value="09">Sep</button>
            <button class="button2" value="10">Oct</button>
            <button class="button2" value="11">Nov</button>
            <button class="button2" value="12">Dec</button>
        </div> 
    <div class="drop_top" id="day" style="background:#009688;  z-index:107;">
            <input type="text" id="day_hold" class="event" style="color:#FFF; font-size:30px; margin-top:70px; margin-left:150px;" maxlength="2" placeholder="Day" >
            
        </div> 


<div class="drop_top"  style="background:#009688; z-index:105;" id="decoder_drop">
            <input type="text" id="link_hold" class="event" style="color:#FFF; font-size:20px; margin-top:70px; margin-left:50px; width:300px;" placeholder="Enter link to the video/audio file " >
    <button style="border:thin; background:transparent; border:thin; color:#CCC; font-size:20px; margin-top:30px; margin-left:150px; cursor:pointer;" id="extract"><u>Extract</u></button>
</div>
