<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<img src="<?= Url::base() ?>/img/articles/<?= $model->image ?>" class="img-responsive" alt="Image">
	<a href="<?= Url::to(['site/article', 'id' => $model->id]) ?>"><h3><?= $model->title ?></h3></a>
	<p class="text-justify"><?= substr($model->text, 0, 256) ?>...</p>
	<p class="text-right"><i>@<?= $model->author ?></i></p>
</div>
