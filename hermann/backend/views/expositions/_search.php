<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpositionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expositions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'exposition_id') ?>

    <?= $form->field($model, 'exposition_title') ?>

    <?= $form->field($model, 'exposition_description') ?>

    <?= $form->field($model, 'exposition_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
