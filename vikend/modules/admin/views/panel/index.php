<?php 
use yii\helpers\Url; 
?>

<div class="page-header">
    <div class="row">

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h1>Zdravo <?= Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname ?></h1>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
            <a data-method="POST" style="margin-top: 5%" href="<?= Url::to(['/site/logout']) ?>" class="btn btn-danger">Odjava</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
        <a href="<?= Url::toRoute('/adminpanel/catgry') ?>" style="font-size: 100px"><span class="glyphicon glyphicon-list"></span></a>
        <p style="text-center"><h3>Kategorije</h3></p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
        <a href="<?= Url::toRoute('/adminpanel/offer') ?>" style="font-size: 100px"><span class="glyphicon glyphicon-file"></span></a>
        <p style="text-center"><h3>Ponude</h3></p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
        <a href="<?= Url::toRoute('/adminpanel/user') ?>" style="font-size: 100px"><span class="glyphicon glyphicon-user"></span></a>
        <p style="text-center"><h3>Korisnici</h3></p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
        <a href="<?= Url::toRoute('/adminpanel/comnt') ?>" style="font-size: 100px"><span class="glyphicon glyphicon-envelope"></span></a>
        <p style="text-center"><h3>Komentari</h3></p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
        <a href="<?= Url::toRoute('/adminpanel/order') ?>" style="font-size: 100px"><span class="glyphicon glyphicon-book"></span></a>
        <p style="text-center"><h3>Porudzbe</h3></p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
        <a href="<?= Url::toRoute('/adminpanel/slide') ?>" style="font-size: 100px"><span class="glyphicon glyphicon-picture"></span></a>
        <p style="text-center"><h3>Slider</h3></p>
    </div>
</div>
