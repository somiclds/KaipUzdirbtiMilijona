<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <title>Restricted</title>

</head>
<body>

    <div id="container">
        <h1>Jei norite prieiti prie šio puslapio, prašome prisijungti</h1>

        <a href='<?php echo base_url() . "/index.php/site/login"?>'>Prisijungti</a><br><br>
        <a href='<?php echo base_url() . "index.php/site/home";?>'>Grįžti į pradinį puslapį</a><br><br>
    </div>

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

    <span id="timer">
    <script type="text/javascript">countDown();</script>
    </span>

</body>

</html>