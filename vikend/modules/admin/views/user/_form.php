<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-offset-2 col-md-4 col-lg-4">
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            <?= $form->field($model, 'pswd')->textInput(['maxlength' => true]) ?>

            <?php $dataList = ['0' => 'Posetilac', '1' => 'Korisnik', '2' => 'Administrator']; ?>

            <?= $form->field($model, 'role')->dropDownList($dataList, ['empty' => '--- Odaberi---']) ?><br/>

            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', 
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

            <?php // $form->field($model, 'added')->textInput() ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
