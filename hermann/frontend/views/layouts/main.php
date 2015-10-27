<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('images/header-paysalp.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    ?>
    <li><a class="navbar-brand navbar-right" href="#"><img alt="Brand" src="images/logo.png"></a></li>
    <?php 
    $menuItems = [



        ['label' => 'Exposition virtuelle', 'url' => ['/site/index']],
        ['label' => 'A propos de cette exposition', 'url' => ['/site/apropos']],
        ['label' => 'Expositions précédentes', 'url' => ['/site/archives']],
    ];



    
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    // } else {
    //     $menuItems[] = [
    //         'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
    //         'url' => ['/site/logout'],
    //         'linkOptions' => ['data-method' => 'post']
    //     ];
    // }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);


    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
