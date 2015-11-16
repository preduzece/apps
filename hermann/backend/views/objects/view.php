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
        <?= Html::a('Mettre à jour', ['update', 'id' => $model->object_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->object_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Êtes-vous sûr de vouloir supprimer cet élément?',
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
            [
            'attribute'=>'object_image',
            'value'=>$model->object_image,
            'format' => ['image',['width'=>'300','height'=>'180']],
            ],
            'expositions_exposition_id',
            'object_created_date',
        ],
    ]) ?>

</div>
