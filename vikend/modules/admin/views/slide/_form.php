<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

	   <div class="row">
	   		<div class="col-xs-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-4">
	   			<?php $form = ActiveForm::begin(['options' => 
        			['enctype' => 'multipart/form-data']]); ?>

			    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

			    <div class="row">
			    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			    		
			            <?php $dataList = ['1' => '*****', '2' => '****', '3' => '***', '4' => '**', '5' => '*']; ?>
			            <?= $form->field($model, 'priority')->dropDownList($dataList, ['empty' => '--- Odaberi---']) ?>
			    	</div>

			    	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

			    		<?= $form->field($model, 'image')->fileInput() ?>
			    	</div>
			    </div>

			    <?php // echo $form->field($model, 'created')->textInput(); ?>

			    <div class="form-group text-right">
			        <?= Html::submitButton($model->isNewRecord ? 'Zapamti' : 'Izmeni', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>
	   		</div>
	   </div>

</div>
