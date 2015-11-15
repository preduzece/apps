<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comnt */

$this->title = 'Create Comnt';
$this->params['breadcrumbs'][] = ['label' => 'Comnts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comnt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
