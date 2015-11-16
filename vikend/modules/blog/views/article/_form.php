<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' =>
        ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'published')->checkbox() ?>
            </div>
        </div>
    </div>

    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
