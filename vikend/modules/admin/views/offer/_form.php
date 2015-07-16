<?php

use yii\helpers\Html;
use app\modules\admin\models\Catgry;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Offer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(['options' => 
        ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'email')->input('email') ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'website')->textInput(['type' => 'url', 'maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?php $categories = Catgry::find()->asArray()->all();
                $dataList = ArrayHelper::map($categories, 'id', 'name');?>

            <?= $form->field($model, 'catgry')->dropDownList($dataList, ['empty' => '--- Odaberi---']) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?php $dataList = ['1' => '*****', '2' => '****', '3' => '***', '4' => '**', '5' => '*']; ?>

            <?= $form->field($model, 'priority')->dropDownList($dataList, ['empty' => '--- Odaberi---']) ?>
        </div>
    </div>

    <?= $form->field($model, 'descript')->textArea(['rows' => 8, 'maxlength' => 2048]) ?>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'location')->textInput() ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'expires')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'image')->fileInput(); ?>
        </div>
    </div>    

    <?php // $form->field($model, 'added')->textInput() ?>

    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', 
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
