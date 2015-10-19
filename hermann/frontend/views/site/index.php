<?php 
use yii\helpers\Url;
use backend\models\Objects;

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    <title>Galerie virtuelle</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/gallery-website.css" rel="stylesheet">
    <link rel="stylesheet" href="lush/css/lush.animations.min.css" />
    <link rel="stylesheet" href="lush/css/lush.min.css" />
    <link href="lush/flexslider/flexslider.css" rel="stylesheet">
    <link href="css/slider-style.css" rel="stylesheet">
  </head>

  <body >

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #191919;">
      <div class="container" style="background-color: #191919;">
        <div class="navbar-header" style="background-color: #191919;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <img src="images/header-paysalp.png" />
          </a>
        </div>
        <div  class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= Url::to('index.php?r=site/index')?>"> Exposition virtuelle </a></li>
            <li><a href="<?= Url::to('index.php?r=site/apropos')?>"> A propos de cette exposition</a></li>
            <li><a href="<?= Url::to('index.php?r=site/archives')?>"> Expositions précédentes</a></li>  
          </ul>
        </div>
      </div>
    </nav>



    <div class="container" id="main-container">
        <div id="main-slider" class="flexslider" data-autostart="false" data-manual="true" style="top:118px;">
            <div class="flex-viewport">

              <ul class="slides" >
                <?php $objects = Objects::find()
                ->select('*')
                ->leftJoin('expositions', '`objects`.`expositions_exposition_id` = `expositions`.`exposition_id`')
                ->where(['exposition_status' => 'active'])
                ->all(); 
                foreach ($objects as $obj): ?> 
                <li class="clone" style="width: 1027px; float: left; display: block;">
                  <img src='<?= $obj->object_image ?>' class="ignore" >
                  <div class="bg-black" data-slide-in="at 0 from top use easeOutCirc during 1000" style="width: 400px; height: 720px; top: 0px; left: 0px; display: none;">
                  </div>
                    <h2 data-slide-in="at 0 from top use easeOutCirc during 500" style="top: 20%; left: 3.5%; color: white; display: none;">
                      <?=$obj->object_title ?>                   
                    </h2>
                  <div style="top: 28%; left: 4.5%; display: none;">
                      <p style="width: 20%; color: white; white-space: normal;  font-size: 13px;">
                          <?=$obj->object_description ?><br>
                          <a href="<?=$obj->object_link ?> "> Link </a>        
                      </p>
                  </div>
                </li>
                <?php endforeach ?>


              </ul>
            </div>

            <ul class="flex-direction-nav">
              <li><a class="flex-prev" href="#">Previous</a></li>
              <li><a class="flex-next" href="#">Next</a></li>
            </ul>
        </div>
        <!-- END  SLIDER -->
    </div>


    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="lush/js/jquery.easing.1.3.min.js"></script>
    <script src="lush/js/jquery.lush.min.js"></script>
    <script src="lush/flexslider/jquery.flexslider-min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
            $('#main-slider').lush({
                autostart:  true
                , manual: true
                , responsive: true
                , baseWidth:  1280
                , baseHeight: 720
                , deadtime: 5000
                , flexslider : {
                  animation:    'slide'
                  , easing:       'easeInOutExpo'
                  , useCSS:       true
                  , pauseOnHover: true
                  , responsive: true
              }
            });
    </script>


  </body>
</html>
