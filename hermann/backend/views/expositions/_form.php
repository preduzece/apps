<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Expositions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expositions-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'exposition_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exposition_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'exposition_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
