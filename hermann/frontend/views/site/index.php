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

    <!--[if lt IE 9]>
    <style type="text/css" media="screen">
    @import "css/bootstrap.css";
    @import "css/gallery-website.css";
    @import "lush/css/lush.animations.min.css";
    @import "lush/css/lush.min.css";
    @import "lush/flexslider/flexslider.css";
    @import "css/slider-style.css";
    </style>

    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="lush/js/jquery.easing.1.3.min.js"></script>
    <script src="lush/js/jquery.lush.min.js"></script>
    <script src="lush/flexslider/jquery.flexslider-min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/rucniJSZaSlider.js"></script>
    <![endif]-->

  </head>

  <body >
    <div class="container" id="main-container">
        <div id="main-slider" class="flexslider" data-autostart="false" data-manual="true" >
            <div class="flex-viewport">
              <ul class="slides" >
                <?php 
                use yii\helpers\Url;
                use backend\models\Objects;
                $objects = Objects::find()
                ->select('*')
                ->leftJoin('expositions', '`objects`.`expositions_exposition_id` = `expositions`.`exposition_id`')
                ->where(['exposition_status' => 'active'])
                ->all(); 
                foreach ($objects as $obj): ?> 
                <li class="clone" >
                  <img src='<?="admin/". $obj->object_image ?>' class="ignore" >
                  <div class="bg-black" data-slide-in="at 0 from top use easeOutCirc during 1000" >
                  </div>
                    <h2 class="nekih2" data-slide-in="at 0 from top use easeOutCirc during 500" >
                      <?=$obj->object_title ?>                   
                    </h2>
                  <div class="nekidiv" >
                      <p class="nekip" >
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
    </div>
    
    <!--[if lt IE 9]>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="lush/js/jquery.easing.1.3.min.js"></script>
    <script src="lush/js/jquery.lush.min.js"></script>
    <script src="lush/flexslider/jquery.flexslider-min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/rucniJSZaSlider.js"></script>
    <![endif]-->

  </body>
</html>
