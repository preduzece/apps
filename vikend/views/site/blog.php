<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
?>

<div class="blog-default-index">

    <h2 class="title text-center">Blog</h2>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'post',
        'summary' => false
    ]); ?>
</div>
