<?php 
use yii\helpers\Url;
use backend\models\Expositions;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
      xmlns:fb="http://ogp.me/ns/fb#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name=Author content="">
    <meta name="copyright" content="">
    <meta name="EXPIRES" content="0">
    <meta name="robots" content="">
    <meta name="googlebot" content="">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>Galerie virtuelle</title>

  </head>

  <body>

    <div class="container" id="main-container">
      <?php $expositions = Expositions::find()->all(); 
        foreach ($expositions as $exp): ?> 
          <?php if ($exp->exposition_status=='active'):?>
            <div class="row" style="margin-top: 120px">
                <div class="row">
                  <div class="col-md-8 expo-apropos">
                    <div class="apropos-description">
                      <h2><?=$exp->exposition_title ?></h2>
                      <p><?=$exp->exposition_description ?></p>
                      <span class="glyphicon glyphicon-camera">
                      </span> 
                    <a href="<?= Url::to(['site/index', 'exposition_id' => $exp->exposition_id]) ?>"><?=$exp->exposition_title ?></a>
                    </div>
                  <div class="apropos-description-img"><img src='<?="admin/". $exp->exposition_image ?>'></div>
                  </div>
                </div>
            </div>
          <?php endif ?>
        <?php endforeach ?>
    </div>

  </body>
</html>
