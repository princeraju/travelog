        
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


<script>
    var mysql_date;
$(document).ready(function(){
   $(".drop_top").css("marginTop", '-1000px');
    
    $('#year_hold').keyup(function(){
        if($(this).val().length>=4)
        {
            year=$(this).val();
            show_drop('#month');
            
        }
    });
    
    
    $(".button2").click(function(){
        month=$(this).attr('value');
        month_word=$(this).html();
        show_drop('#day');
        $('#day_hold').focus();
    });
    
    $('#day_hold').keyup(function(){
        if($(this).val().length>=2)
        {
            day=$(this).val();
            hide_drop('#day');
            setTimeout(function(){
            hide_drop('#month');
            },200);
            setTimeout(function(){
            hide_drop('#year');
            },400);
            
            $('#full_date').html(day+" "+month_word+" "+year);
            $('#add_date_button').html('<u>Edit Date</u>');
            mysql_date=year+'-'+month+'-'+day;
        }
    });
    
});
</script>