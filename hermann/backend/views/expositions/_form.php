<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Expositions */
/* @var $form yii\widgets\ActiveForm */
?>

<script>
	 function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
</script>

<div class="expositions-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'exposition_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exposition_description')->textarea(['rows' => 8]) ?>

    <?= $form->field($model, 'file', [
    		'inputOptions' => [
		        'placeholder' => $model->getAttributeLabel('demo'),
		        'onchange' => 'showMyImage(this)',
		        'type' => 'file',
		    ]
    	])->fileInput() ?>



	<img  id="thumbnil" style="width:20%; margin-top:10px;"  src="admin/" alt="image"/>


    <?= $form->field($model, 'exposition_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Exposition status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
