<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<img src="<?= Url::base() ?>/img/articles/<?= $model->image ?>" class="img-responsive" alt="Image">
	<h3><?= $model->title ?></h3>
	<p class="text-justify"><?= substr($model->text, 0, 256) ?>...</p>
	<p class="text-right"><i>@<?= $model->author ?></i></p>
</div>
