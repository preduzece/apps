<?php
use yii\helpers\Url;
use yii\helpers\Html;

use app\models\Catgry;

/* @var $this yii\web\View */
$this->title = '404';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <div class="blog-post-area">
        <h2 class="title text-center">Gde za vikend mapa sajta</h2>
        <div class="single-blog-post">
            <h2>Mapa sajta</h2>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?= Url::to(['site/index']) ?>">Pocetna</a></li>
                <li><a href="<?= Url::to(['site/about']) ?>">Kategorije</a></li>
                <ul>
                    <?php $categories = Catgry::find()->all(); 
                    foreach ($categories as $category): ?> 
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?= Url::to(['site/offers', 'catgry' => $category->id]) ?>">- <?= $category->name ?></a></li>
                    </ul>
                    <?php endforeach ?>
                </ul>

                <li><a href="<?= Url::to(['site/about']) ?>">O nama</a></li>
                <li><a href="<?= Url::to(['site/contact']) ?>">Kontakt</a></li>
                <li><a href="<?= Url::to(['site/report']) ?>">Najčešća pitanja</a></li>
                <li><a href="<?= Url::to(['site/report']) ?>">Uslovi korisćenja</a></li>
                <li><a href="<?= Url::to(['site/friends']) ?>">Prijatelji sajta</a></li>
            </ul>
        </div>
    </div><!--/blog-post-area-->

</div>
