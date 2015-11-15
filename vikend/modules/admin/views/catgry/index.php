<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CatgrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategorije';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catgry-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?= Html::a('Nova Kategorija', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'descript:ntext',
            'added',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
