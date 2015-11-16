<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slide */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Slajdovi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-right">
        <?= Html::a('Izmeni', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Obrisi', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <img src="<?= Url::base() ?>/img/slides/<?= $model->image ?>"
        style="margin-bottom: 30px" class="img-responsive">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
            'image',
            'link',
            'created',
        ],
    ]) ?>

</div>
