<html>
<head>
    <title>My Form</title>
</head>
<body>

<h3>Jūsų paraiška sėkmingai išsiųsta</h3>

<script type="text/javascript">
    var count = 6;
    var redirect = "<?php echo base_url() . "index.php/site/home";?>";

    function countDown(){
        var timer = document.getElementById("timer");
        if(count > 0){
            count--;
            timer.innerHTML = "Jūs būsite gražintas į pradinį puslapį po "+count+" sekundžių.";
            setTimeout("countDown()", 1000);
        }else{
            window.location.href = redirect;
        }
    }
</script>

<?php
    echo $upload_data['raw_name'].$upload_data['file_ext'];
?>

<p><?php echo anchor("", 'Grįžti į pradinį puslapį!'); ?></p>
<span id="timer">
    <script type="text/javascript">countDown();</script>
    </span>

</body>
</html>