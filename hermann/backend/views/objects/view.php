<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Objects */

$this->title = $model->object_id;
$this->params['breadcrumbs'][] = ['label' => 'Objects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->object_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->object_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $path = Yii::getAlias('@frontend') .'/web/'; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'object_id',
            'object_title',
            'object_description:ntext',
            'object_link',
            'object_image',
            'expositions_exposition_id',
            'object_created_date',
        ],
    ]) ?>

</div>
