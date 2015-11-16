<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = 'Izmeni Video: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Izmeni';
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
