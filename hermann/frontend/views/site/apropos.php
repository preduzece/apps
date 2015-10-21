<?php 
use yii\helpers\Url;
use backend\models\Expositions;
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

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
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
            <li><a href="<?= Url::to('index.php?r=site/index')?>"> Exposition virtuelle </a></li>
            <li class="active"><a href="<?= Url::to('index.php?r=site/apropos')?>"> A propos de cette exposition </a></li>
            <li><a href="<?= Url::to('index.php?r=site/archives')?>"> Expositions précédentes </a></li>           
          </ul>
        </div>
      </div>
    </nav>




    <div class="container" id="main-container">
      <?php $expositions = Expositions::find()->all(); 
        foreach ($expositions as $exp): ?> 
          <?php if ($exp->exposition_status=='active'):?>
            <div class="row" style="margin-top: 100px">
                <div class="row">
                  <div class="col-md-8 expo-apropos">
                    <div class="apropos-description">
                      <h2><?=$exp->exposition_title ?></h2>
                      <p><?=$exp->exposition_description ?></p>
                    </div>
                  <div class="apropos-description-img"><img src='<?=$exp->exposition_image ?>'></div>
                  </div>
                </div>
            </div>
          <?php endif ?>
        <?php endforeach ?>
    </div>


    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="lush/js/jquery.easing.1.3.min.js"></script>
    <script src="lush/js/jquery.lush.min.js"></script>
    <script src="lush/flexslider/jquery.flexslider-min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
