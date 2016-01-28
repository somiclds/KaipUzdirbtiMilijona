<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 text-center">
                <h1>Turimi logotipai</h1>
            </div>
        </div>
    </div>
    <div class="container logos-section">
        <div class="row">
                    <?php
                    foreach ( $links as $row) {
                        echo "<div class=\"col-xs-3 text-center\">";
                            echo "<a class=\"link-delete\" href=\"" . base_url() . "index.php/site/delete_user_data/" . $row->name . "\">Ištrinti ". $row->name ."</a>";
                            echo "<div class=\"imgDiv\">";
                                echo "<a class=\"imgLink\" name=\"" . $row->name . "\" href=\"" . $row->url . "\" target=\"_blank\">" .
                                    '<img src="' . images_url() . $row->img.  '" />' . "</a>\n";
                            echo "</div>";
                        echo "</div>";
                    }
                    ?>
        </div>
    </div>

</body>

</html>