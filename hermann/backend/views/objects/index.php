<?php

use yii\helpers\Html;
use backend\models\Objects;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Objects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php 
        $path = Yii::getAlias('@anyname') .'/';
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
                    if($model->expositionsExposition->exposition_status == 'active')
                    {
                        return ['class'=>'success'];
                    }else
                    {
                        return ['class'=>'danger'];
                    }
                },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'object_id',
            'expositionsExposition.exposition_title',
            'object_title',
            'object_description:ntext',
            'object_link',
            [
                'attribute' => 'object_image',
                'format' => 'html',
                'label' => 'Object image',
                'value' => function ($data) {
                    return Html::img('../'.$data->object_image,
                        ['width' => '100px', 'height' => '60px']);
                },
            ],
            
            // 'object_created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
