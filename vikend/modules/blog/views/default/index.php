<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
?>

<div class="blog-default-index">
    <div class="row">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'article',
            'summary' => false
        ]); ?>
    </div>
</div>
