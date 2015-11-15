<?php
use yii\helpers\Url;
use yii\helpers\Html;

use app\models\Offer;
use app\models\Catgry;

use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use app\widgets\AutoComplete;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gde za vikend u Beogradu, gde za vikend u Srbiji? Najbolje ponude za vikend, najluđi provod i najbolja ponuda za savršen vikend.    Pronađi zabavu">
    <meta name="keywords" content="vikend, gde za vikend, vikend u Srbiji, vikend u Beogradu, savršen vikend, savršen provod, vikend zabava">
    <meta name="author" content="Gde za vikend | www.gdezavikend.rs">

    <meta property="og:url"         content="http://gdezavikend.rs" />
    <meta property="og:title"       content="GdeZaVikend Official Web Page" />
    <meta property="og:description" content="gdezavikend.rs, pravi izvor zabave! ;)" />
    <meta property="og:image"       content="http://gdezavikend.rs/vikend/web/img/slides/vikend.jpg" />

    <?= Html::csrfMetaTags() ?>
    <title>Gde za vikend | Gde za vikend u Beogradu, gde za vikend u Srbiji? Najbolje ponude za najluđi provod i savršen vikend. Pronađi zabavu</title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="<?= Url::base() ?>/img/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= Url::base() ?>/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= Url::base() ?>/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= Url::base() ?>/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= Url::base() ?>/img/ico/apple-touch-icon-57-precomposed.png">

    <link href="<?= Url::base() ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/price-range.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/animate.css" rel="stylesheet">
    <link href="<?= Url::base() ?>/css/responsive.css" rel="stylesheet">

    <script src="<?= Url::base() ?>/js/jquery.js"></script>
    <script src="<?= Url::base() ?>/js/bootstrap.min.js"></script>
    <script src="<?= Url::base() ?>/js/jquery.scrollUp.min.js"></script>
    <script src="<?= Url::base() ?>/js/price-range.js"></script>
    <script src="<?= Url::base() ?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?= Url::base() ?>/js/main.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-64193415-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>
<body>

    <div id="fb-root"></div>
    <script>
      <?php if ($_SERVER['HTTP_HOST'] == 'localhost'): ?>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '521841924646601',
          xfbml      : true,
          version    : 'v2.4'
        });
      };
      <?php else: ?>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '521646161332844',
          xfbml      : true,
          version    : 'v2.4'
        });
      };
      <?php endif ?>

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

<?php $this->beginBody() ?>

    <header id="header"><!--header-->
    
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row fixed-top">
                     <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="<?= Url::to(['site/index']) ?>">
                                    <img src="<?= Url::base() ?>/img/home/logonovi.png" alt="">
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/gdezavikend1"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCPh-kvuQ4RijUYBQtQpzxBA"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/u/0/b/101770396487292153275/101770396487292153275/about">
                                    <i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->


        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                
                <div class="row">

                    <div class="col-sm-8">

                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?= Url::to(['site/index']) ?>">Početna</a></li>
                                <li><a href="<?= Url::to(['site/offers']) ?>">Ponude</a></li> 
                                <li><a href="<?= Url::to(['site/gallery']) ?>">Galerija</a></li>
                                <li><a href="<?= Url::to(['site/blog']) ?>">Blog</a></li>
                                <li><a href="<?= Url::to(['site/about']) ?>">O nama</a></li> 
                                <li><a href="<?= Url::to(['site/contact']) ?>">Kontakt</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4">

                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Navigacija</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <div class="search_box pull-right">
                                    <?php $model = new Offer();

                                    $form = ActiveForm::begin([
                                        'enableClientValidation' => false,
                                        'action' => ['site/offers'],
                                        'method' => 'post',
                                    ]); ?>

                                    <input type="text" name="descript" placeholder="Pretraga...">

                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>                                
                    </div>

                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Kategorije</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                        <?php $categories = Catgry::find()->all(); 

                        foreach ($categories as $category): ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?= Url::to(['site/offers', 'catgry' => $category->id]) ?>">
                                            <?= $category->name ?></a></h4>
                                </div>
                            </div>
                            
                        <?php endforeach ?>

                        </div><!--/category-products-->

                        <div class="fb-like" data-share="true" data-width="230" data-show-faces="true"> </div>

                        <div class="text-center" style="margin-bottom: 20px"><!--baneri-->
                            <a href="http://bit.ly/1TNfKCu" target="_blank"><img class="img-responsive" src="<?= Url::base() ?>/img/home/mlgbaner.jpg" alt="Igraonica"/></a><br>
                            <a href="http://bit.ly/1LuqkvA" target="_blank"><img class="img-responsive" src="<?= Url::base() ?>/img/home/cvecarabaner.jpg" alt="cvecara" /></a>
                        </div><!--/baneri-->

                    </div>
                </div>

                <!--Sadrzaj-->
                <div class="col-sm-9 padding-right">    
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer"><!--Footer-->
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="companyinfo">
                            <img class="img-responsive" src="<?= Url::base() ?>/img/home/baner.png" alt="gde za vikend logo">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="single-widget companyinfo">
                                    <h2>Kategorije</h2>
                                    <?php $categories = Catgry::find()->all(); 

                                    foreach ($categories as $category): ?> 
                                        
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?= Url::to(['site/offers', 'catgry' => $category->id]) ?>"><?= $category->name ?></a></li>
                                    </ul>
                                    
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="single-widget companyinfo">

                                    <h2>Servisi</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?= Url::to(['site/feed']) ?>">Gde za vikend servis</a></li>
                                        <li><a href="<?= Url::to(['site/report']) ?>">Android aplikacija</a></li>
                                        <li><a href="<?= Url::to(['site/report']) ?>">IOS aplikacija</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="single-widget companyinfo">
                                    <h2>Informacije</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?= Url::to(['site/about']) ?>">O nama</a></li>
                                        <li><a href="<?= Url::to(['site/sitemap']) ?>">Mapa sajta</a></li>
                                        <li><a href="<?= Url::to(['site/friends']) ?>">Prijatelji sajta</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="single-widget companyinfo">
                                    <h2>Uputstva i uslovi</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?= Url::to(['site/report']) ?>">Najčešća pitanja</a></li>
                                        <li><a href="<?= Url::to(['site/report']) ?>">Uslovi korisćenja</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © gdezavikend.rs</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.gdezavikend.rs">gdezavikend.rs</a></span></p>
                </div>
            </div>
        </div>
    </footer><!--/Footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
