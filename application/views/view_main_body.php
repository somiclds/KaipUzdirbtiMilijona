<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">Kaip uždirbti milijoną</h1>
                    <p class="intro-text">Skaityti plačiau.</p>
                    <a href="#about" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section id="about" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Apie idėją</h2>
            <p>Tai trijų studentų lietuvių, idėja skatinti bei remti jaunimo verslumą. Norime suburti kuo daugiau įmonių,
                kurios norėtų patalpinti savo logotipą šiame tinklapyje. Siekiame, kad šis projektas susilauktų susidomėjimo
                viešoje erdvėje. Suteikdami įmonėms reklamą, ketiname rengti konkursus, per kuriuos, pasitelkus rinkos analitikų pagalbą,
                geriausios jaunimo verslo idėjos gaus materialinę paspirtį - pradinį kapitalą.
                Paspaudus logotipą  lankytojai iškart bus nukreipti į Jūsų svetainę.
                Kviečiame prisijungti ir Jus prie šios idėjos vystymo, nes kartu galime sukurti šviesesnę Lietuvos ekonomikos ateitį!
            </p>
        </div>
    </div>
</section>

<!-- Board Section -->
<section id="board" class="board">
    <div class="container-fluid">
        <?php
        foreach ( $links as $row) {
            echo "<a class=\"imgLink\" target=\"_blank\" name=\"" . $row->name . "\"href=\"" . $row->url . "\">" .
                '<img src="' . images_url() . $row->img.  '" />' . "</a>\n";
        }
        ?>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Kontaktai</h2>
            <br>
            <p><a href="mailto:email@kaipuzdirbtimilijona.lt">email@kaipuzdirbtimilijona.lt</a>
            </p>
            <ul class="list-inline banner-social-buttons">
                <li>
                    <a href="https://facebook.com" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                </li>
                <li>
                    <a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                </li>
                <li>
                    <a href="https://plus.google.com/" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                </li>
            </ul>
        </div>
    </div>
</section>