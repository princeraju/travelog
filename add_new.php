<?php 
    $title="Add New Travel";
    require_once('pw_for_travelog.php');
?>

<?php
    require_once('header.php'); 
?>
<div class="container">

    <div class="container-new">
    
        <div class="box">
            <div class="hint" id="title_hint">Title</div>
            <input type="text" name="title" to-hide="" id="title" class="add_input" placeholder="Title" autofocus maxlength="60">
            <div class="hint" id="intro_hint" style="border-bottom:none;">Introduction</div>
            <textarea type="text" name="intro" to-hide="intro_hint" id="intro" class="add_input" placeholder="Introduction"></textarea>
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
<?php require_once('footer.php');?>