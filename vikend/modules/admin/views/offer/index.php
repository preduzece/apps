<?php

use yii\helpers\Html;
use yii\grid\GridView;
use models\Offer;
use models\Catgry;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ponuda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?= Html::a('Nova Ponuda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'catgry',
                'value' => function ($data) {
                    return $data->category->name;
                }
            ],
            'name',
            //'email:email',
            //'phone',
            //'website:url',
            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img('img/offers/'.$data->image,
                        ['width' => '200px', 'height' => '100px']);
                },
            ],
            // 'descript:ntext',
            //'location',
            'priority',
            //'expires:datetime',
            // 'added:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
