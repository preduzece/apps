<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>
<?php
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catgry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catgry-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-sm-10">
    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'descript')->textarea(['id'=>'descript', 'rows' => 6]) ?>

            <script>
                CKEDITOR.replace( 'descript' );
            </script>

		    <?php // $form->field($model, 'added')->textInput() ?>

		    <div class="form-group text-right">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', 
		        	['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
    	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
