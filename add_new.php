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
            <input type="text" name="title" to-hide="title_hint" id="title" class="add_input" placeholder="Title" autofocus maxlength="60">
        </div>
        
    </div>
</div>
<script>
    $(document).ready(function(){
        var cur;
    $('#title').on('input', function() {
        cur='#'+$('#title').attr('to-hide');
        
        if($('#title').val().length>0)
            $(cur).show(700);
        else
            $(cur).hide(700);
    });
        
    });
</script>
<?php require_once('footer.php');?>