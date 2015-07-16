<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catgry */

$this->title = 'Nova Kategorija';
$this->params['breadcrumbs'][] = ['label' => 'Kategorije', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catgry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
