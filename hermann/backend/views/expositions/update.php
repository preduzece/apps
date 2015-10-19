<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Expositions */

$this->title = 'Update Expositions: ' . ' ' . $model->exposition_id;
$this->params['breadcrumbs'][] = ['label' => 'Expositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->exposition_id, 'url' => ['view', 'id' => $model->exposition_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expositions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
