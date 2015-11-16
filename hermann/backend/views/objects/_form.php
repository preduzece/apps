<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Expositions;


/* @var $this yii\web\View */
/* @var $model backend\models\Objects */
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

<div class="objects-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'object_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'object_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'object_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file', [
            'inputOptions' => [
                'onchange' => 'showMyImage(this)',
            ]
        ])->fileInput() ?>

    <img  id="thumbnil" style="width:20%; margin-top:10px;"  src="<?=$model->object_image ?>" alt="image"/>

    <?= $form->field($model, 'expositions_exposition_id')->dropDownList(
            ArrayHelper::map(Expositions::find()->all(), 'exposition_id', 'exposition_title'),
            ['prompt'=>'Exposition:']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
