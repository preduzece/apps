<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Expositions */

$this->title = $model->exposition_id;
$this->params['breadcrumbs'][] = ['label' => 'Expositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expositions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Mettre à jour', ['update', 'id' => $model->exposition_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->exposition_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Êtes-vous sûr de vouloir supprimer cet élément?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'exposition_id',
            'exposition_title',
            'exposition_description:ntext',
            [
            'attribute'=>'exposition_image',
            'value'=>$model->exposition_image,
            'format' => ['image',['width'=>'300','height'=>'180']],
            ],
            'exposition_status',
        ],
    ]) ?>

</div>
