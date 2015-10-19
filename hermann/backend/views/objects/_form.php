<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Expositions;


/* @var $this yii\web\View */
/* @var $model backend\models\Objects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objects-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'object_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'object_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'object_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'expositions_exposition_id')->dropDownList(
            ArrayHelper::map(Expositions::find()->all(), 'exposition_id', 'exposition_title'),
            ['prompt'=>'Exposition:']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
