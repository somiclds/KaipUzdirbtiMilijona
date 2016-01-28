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

    <title>Paraiška</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo asset_url() ?>css/paraiska.css" rel="stylesheet">

</head>
<body>

<?php echo form_open_multipart('index.php/site/paraiska'); ?>


<form>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1>Paraiška</h1>
                <span style="color:red"><?php echo validation_errors(); ?>
                <span style="color:red"><?php echo $error; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <label for="text">Įmonė</label>
                    <input type="text" class="form-control" name="Įmonė" placeholder="Įmonės pavadinimas" size="50">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <label for="inputURL">URL</label>
                    <input type="text" name="URL" class="form-control" placeholder="URL" size="50">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <label>Pasirinkite logotipą</label>
                <?php
                $data_form=array(
                    'name' => 'userfile'
                );

                echo form_upload($data_form);
                ?><br/>

                <button type="submit" value="Siųsti" class="btn btn-primary">Siųsti</button>

                <?php echo form_close() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <br/><a href="<?php echo base_url()?>" >Grįžti į pradinį puslapį</a>
            </div>
        </div>
    </div>
</form>

</body>

<footer>

</footer>


</html>