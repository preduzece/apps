<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Offer */

$this->title = 'Nova Ponuda';
$this->params['breadcrumbs'][] = ['label' => 'Ponude', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
