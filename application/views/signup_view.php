<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="lt" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registracija</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo asset_url() ?>css/login.css" rel="stylesheet">

</head>
<body>
    <?php
    echo form_open('index.php/site/signup_validation');
    ?>

    <form>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1>Registracija</h1>
                <span style="color:red"><?php echo validation_errors();?>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <label for="text">El. paštas: </label>
                        <input type="text" class="form-control" name="email" placeholder="El. paštas" size="50">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <label for="password">Slaptažodis: </label>
                        <input type="password" class="form-control" name="password" placeholder="Slaptažodis" size="50">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <label for="password">Pakartokite slaptažodį: </label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Pakartokite slaptažodį" size="50">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <button type="submit" value="submit" class="btn btn-primary btn-login">Registruotis!</button>
                    <?php echo form_close() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <a href="<?php echo base_url()?>" >Grįžti į pradinį puslapį</a>
                    <a class="pull-right" href='<?php echo base_url() . "index.php/site/login";?>'>Prisijungimas</a>
                </div>
            </div>
        </div>
    </form>

</body>
</html>