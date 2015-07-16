<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catgry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catgry-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-xs-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-4">
    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'descript')->textarea(['rows' => 6]) ?>

		    <?php // $form->field($model, 'added')->textInput() ?>

		    <div class="form-group text-right">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', 
		        	['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
    	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
