<body>


<section id="blog_header" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <H1 id="title">Redaguoti blog'ą</H1>
        </div>
    </div>
</section>

<section id="blog_content" class="container content-section text-center" >
    <?php
    foreach ( $links as $row) {
        echo '<div class="row">'. "\n";
        echo "<a class=\"link-edit\"href=\"" . base_url() . "index.php/site/edit_blog_post/?id=" . $row->id . "\">Redaguoti</a><br>";
        echo "<a class=\"link-delete\" href=\"" . base_url() . "index.php/site/delete_blog_post/" . $row->id . "\">Ištrinti</a>";
        echo "\t\t" . '<div  class="col-lg-8 col-lg-offset-2">' . "\n";
        echo "\t\t\t" . '<img src="' . blog_images_url() .  $row->img . '" width="80%" height="auto" />' . "\n";
        echo "\t\t\t" . '<p>'. $row->text .'</p>' . "\n";
        echo "\t\t" . '</div>' . "\n";
        echo "\t" . '</div>' . "\n";
    }
    ?>
</section>
<footer>
    <!-- jQuery -->
    <script src="<?php echo asset_url() ?>js/jquery.js"></script>

    <!-- Custom jQuery -->
    <script src="<?php echo asset_url() ?>js/scroll.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo asset_url() ?>js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo asset_url() ?>js/jquery.easing.min.js"></script>
</footer>
</body>
</html>