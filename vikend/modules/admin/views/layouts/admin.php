<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use app\assets\AppAsset;

# AppAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>GdeZaVikend</title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap" style="margin-bottom: 3%">
        <?php
            NavBar::begin([
                'brandLabel' => 'GdeZaVikend',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Panel', 'url' => ['/adminpanel']],
                    ['label' => 'Korisnici', 'url' => ['/adminpanel/user']],
                    # ['label' => 'Komentari', 'url' => ['/adminpanel/comnt']],
                    ['label' => 'Kategorije', 'url' => ['/adminpanel/catgry']],
                    # ['label' => 'Porudzbe', 'url' => ['/adminpanel/order']],
                    ['label' => 'Ponude', 'url' => ['/adminpanel/offer']],
                    ['label' => 'Slider', 'url' => ['/adminpanel/slider']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->fname . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container" style="padding-top: 5%">
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Panel', 'url' => ['/adminpanel']],
                'links' => isset($this->params['breadcrumbs']) ? 
                    $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; GdeZaVikend <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>