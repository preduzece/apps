<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">
    function initialize() {

        var pozicija = new google.maps.LatLng(<?= $model->location ?>);

        var mapOptions = {
            zoom: 15, center: pozicija
        }

        var lokacijaPonude = new google.maps.Map(
            document.getElementById('mapa'), mapOptions);
    
        var marker = new google.maps.Marker({
            position: pozicija,
            map: lokacijaPonude,
            title: '<?= $model->name ?>'
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="blog-post-area">
    <h2 class="title text-center"><?= $model->name ?></h2>
    <div class="single-blog-post">
        <div class="col-sm-8">
            <a href="<?= $model->website ?>">
                <img src="<?= Url::base() ?>/img/offers/<?= $model->image ?>" alt="">
            </a>
            <h3><?= $model->name ?></h3>
            
            <p><?= $model->descript ?></p>
        </div>
        <div class="col-sm-4">
            <h3>Informacije</h3>
            <b>Telefon: </b> <?= $model->phone ?> <p></p>
            <p><b>Email: </b> <?= $model->email ?></p>
            <p><b>Sajt: </b> <a href="<?= $model->website ?>"><?= $model->website ?> </a> </p>
            <p><b>Lokacija: </b></p>
            <div id="mapa" style="height: 400px;"></div>
            <div id="prognoza" class="weather" style="margin-top:15px">
                <a href="http://www.accuweather.com/en/rs/belgrade/298198/weather-forecast/298198" class="aw-widget-legal">
                <!--
                By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) 
                which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s 
                Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
                -->
                </a><div id="awcc1434913449002" class="aw-widget-current"  data-locationkey="298198" data-unit="c" 
                    data-language="en-us" data-useip="false" data-uid="awcc1434913449002" style="color: white; !important">
                </div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>

                <script type="text/javascript">
                    window.onload = function () {

                        setTimeout(function () {
                            var widButton = document.
                                getElementById('link_get_widget');

                            widButton.remove();
                        }, 1000)
                    }
                </script>
            </div>
        </div>
    </div>
</div>
