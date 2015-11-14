<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ObjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'object_id') ?>

    <?= $form->field($model, 'object_title') ?>

    <?= $form->field($model, 'object_description') ?>

    <?= $form->field($model, 'object_link') ?>

    <?= $form->field($model, 'object_image') ?>

    <?php // echo $form->field($model, 'expositions_exposition_id') ?>

    <?php // echo $form->field($model, 'object_created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
