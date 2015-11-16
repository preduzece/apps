<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
?>

<h2 class="title text-center">Gde za vikend - <?= $category ?></h2>
<div class="features_items"><!--features_items-->

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'item',
        'summary' => false
    ]); ?>	
</div>