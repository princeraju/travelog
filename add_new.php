<?php 
    $title="Add New Travel";

    require_once('pw_for_travelog.php');
?>

<?php
    require_once('header.php'); 
?>

<?php require_once('gallery_drop.php');?>
<div class="container">
<?php require_once('navtab.php')?>
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
        
        
        <div class="data_adder">
            
        </div>
        
        <div class="box" id="create_new_event" style="display:none;">
            <div id="full_date" style="color:#333; font-size:24px;"></div>
            <button id="add_date_button" class="button" style="margin-left:0px; font-size:14px; color:#444; text-decoration:underscore;" onClick="show_drop('#year')"><u>Add Date</u></button>
            <br/><br/>
            <input type="text" name="title" to-hide="" id="title" class="event add_input title_small" placeholder="Title" autofocus maxlength="30" style="font-size:19px">
            <div class="hint" id="scribble_hint" style="border-bottom:none;">My scribblings</div>
            <textarea type="text" name="details" to-hide="scribble_hint" id="scribble" class="add_input" placeholder="My scribblings"></textarea>
            <input type="hidden" id="secondary_pic" value="">
            <div style="font-size:30px; cursor:pointer;" id="secondary_add"><span class="icon-image"></div><span id="sec_img" style="display:none;">Image Added<br/></span>
            <div class="button" id="awesome_button" style=" margin-left:10%; width:150px;"><span class="icon-radio-checked" style="color:#96002e;"></span> Auto Decode</div>
            <button class="button" id="save_button">Save</button>
        </div>
        
    </div>
                    <div id="extracted" style="opacity:0;"></div>
</div>
<script>

$(document).ready(function(){
        var mysql_date;
        var qwer=0;
    $('#secondary_add').click(function(){
        qwer=1;
        show_drop(".gallery_drop");
    });
    $('.add_image').click(function(){
        qwer=0;
    });
    
    $('#year_hold').keyup(function(){
        if($(this).val().length>=4)
        {
            year=$(this).val();
            show_drop('#month');
            
        }
    });
    
    $('#awesome_button').click(function(){
        $('#decoder_drop').animate({
                marginTop:'0px'
                },700);
    });
    $('#extract').click(function(){
        var tem=$('#link_hold').val();
        if(tem.length>0)
        {
            $("#extracted").load("testhp.php", {"type":"0", "param":tem});
        }
    });
    $('#extracted').bind("DOMSubtreeModified",function(){
        var temp4=$("#extracted").html();
        $('#scribble').val(temp4);
        $('.drop_top').animate({
                marginTop:'-1000px'
                },700);
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


        var cur;
    $('.add_input').on('input', function() {
        cur='#'+$(this).attr('to-hide');
        
        if($(this).val().length>0)
            $(cur).show(700);
        else
            $(cur).hide(700);
    });
       
            $('#save_button').click(function(){
            var date=mysql_date;
            var title=$('.title_small').val();
            var des=$('#scribble').val();
                if($('#secondary_pic').val().length>0)
                    des=des+'<br/><img src="user_pics/'+$('#secondary_pic').val()+'" style="width:100%; border-radius:5px;">';
                
            $('#save_button').load('a_insert_log.php',{"id": log_id, "title":title, "des":des, "date":date, "id_journey":log_id});
            
            var string='<div class="box2">'+
            '<div class="date">'+day+'-'+month+'-'+year+'</div>'+
                '<h4 style="color:#3e3e3e;">'+title+'</h4>'+
                '<blockquote>'+des+'</blockquote>'+
            '</div>';
            $('.data_adder').append(string);
            
            $('.title_small').val('');
            $('#scribble').val('');
            $('#full_date').html('');
            $('#sec_img').hide(500);
            $('#add_date_button').html('<u>Add Date</u>');
            $('#scribble_hint').hide(500);
        });

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
            
            if(qwer==1)
            {
                $('#secondary_pic').val(cur2);
                $('#sec_img').show(500);
                $('.gallery_drop').animate({
                marginTop:'-1000px'
                },700);
                
            }
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
    
$('#container').click(function(){
    $('.drop_top').animate({
            marginTop: '-1000px'
        },500);
    $('.gallery_drop').animate({
            marginTop: '-1000px'
        },500);
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