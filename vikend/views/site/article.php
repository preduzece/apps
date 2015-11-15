<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="blog-post-area">
    <h2 class="title text-center">Clanak - <?= $model->title ?></h2>
    <div class="single-blog-post fixer">
        <img src="<?= Url::base() ?>/img/articles/<?= $model->image ?>" class="img-responsive" alt="">
        <h3><?= $model->title ?></h3>
        <p class="text-justify"><?= $model->text ?></p>
        <p class="text-right"><i>@<?= $model->author ?></i></p>
        <button type="button" onclick="share()" class="btn btn-danger"><i class="fa fa-facebook"></i> Podeli</button>
    </div>
</div>

<div class="social-networks">
    <h2 class="title text-center">Društvene mreže</h2>
    <div class="single-blog-post">
        <ul class="social-icons">
            <li><a href="https://www.facebook.com/gdezavikend.rs"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCPh-kvuQ4RijUYBQtQpzxBA"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://plus.google.com/u/0/b/101770396487292153275/101770396487292153275/about">
                <i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
</div>

<script type="text/javascript">
	function share () {
		FB.ui({
		  method: 'feed',
		  title: 'Gde Za Vikend | Blog | <?= $model->title ?>',
		  name: 'Gde Za Vikend | Article: <?= $model->title ?> | Author: <?= $model->author ?>',
		  picture: '<?= Url::base() ?>/img/articles/<?= $model->image ?>',
		  description: '<?= substr($model->text, 0, 96) ?>...',
		  link: '<?= Url::current() ?>'
		}, function(response){});
	}
</script>
