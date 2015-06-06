<?php 
    $title="Add New Travel";
    require_once('pw_for_travelog.php');
?>

<?php
    require_once('header.php'); 
?>
<div class="container">
<?php require_once('navtab.php')?>
<?php require_once('gallery_drop.php');?>
    <div class="container-new">
    
        <img class="main_image" src="" >
        <div class="box">
            <div class="hint" id="title_hint">Title</div>
            <input type="text" name="title" to-hide="" id="title" class="add_input" placeholder="Title" autofocus maxlength="60">
            <div class="hint" id="intro_hint" style="border-bottom:none;">Introduction</div>
            <textarea type="text" name="intro" to-hide="intro_hint" id="intro" class="add_input" placeholder="Introduction"></textarea>
            <input type="hidden" id="hidden_image" value="">
            <div class="add_image"><span class="icon-image"></span></div>
            
            <button class="button" id="add_day">Add more</button>
        </div>
        
        <div class="box" id="create_new_event" style="display:none;">
            
            
            <div id="full_date" style="color:#333; font-size:24px;"></div>
            <button id="add_date_button" class="button" style="margin-left:0px; font-size:14px; color:#444; text-decoration:underscore;" onClick="show_drop('#year')"><u>Add Date</u></button>
            <br/><br/>
            <input type="text" name="title" to-hide="" id="title" class="event add_input" placeholder="Title" autofocus maxlength="30" style="font-size:19px">
        </div>
        
    </div>
</div>
<script>
    $(document).ready(function(){
        var cur;
    $('.add_input').on('input', function() {
        cur='#'+$(this).attr('to-hide');
        
        if($(this).val().length>0)
            $(cur).show(700);
        else
            $(cur).hide(700);
    });
        
    });
</script>
<script>
$(document).ready(function(){
    var cur2;
    var temp= '<?php echo uniqid();?>';
    var log_id= temp;
    var year, month, day;
    $('.add_image').click(function(){
        $('.gallery_drop').animate({
            marginTop:'0px'},700);
    });
    
   $('.image_holder').click(function(){
        cur2=$(this).attr('loc');
        if(cur2=='null')
            alert('Hey! Image uploading will be added in the next beta launch');
        else
        {
            $('.main_image').animate({
                    width: '0px',
                    marginLeft:'0px'
                },700);
                $('.main_image').delay(400).attr('src', 'user_pics/'+cur2);
                $('#hidden_image').val(cur2);

                $('.gallery_drop').animate({
                marginTop:'-1000px'
                },700);
                $('.main_image').animate({
                    width: '900px',
                    marginLeft:'-450px'
                },700);
           
                                     
        }
    });
    
    $('#add_day').click(function(){
        if($('#title').val().length<1)
            alert("Title can't be empty");
        else if ($('#intro').val().length<1)
            alert("Intro can't be empty");
        else
        {
            var title=$('#title').val();
            var intro=$('#intro').val();
            var image=$('#hidden_image').val();
            $('#add_day').html("Saving..");
            $('#add_day').load('a_insert_event.php',{'title': title, 'intro': intro, 'image':image, 'id':temp});
           
                    $('#create_new_event').show(500);
        }
    });
});

    
    function show_drop(temp) 
    {
        $(temp).animate({
            marginTop: '0px'
        },500);
        if(temp=="#year")
            $('#year_hold').focus();
    }
    function hide_drop(temp) 
    {
        $(temp).animate({
            marginTop: '-1000px'
        },500);
    }

</script>

<?php require_once('footer.php');?>