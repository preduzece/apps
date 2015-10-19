<?php

use yii\helpers\Html;
use backend\models\Expositions;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpositionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expositions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expositions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expositions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
                    if($model->exposition_status == 'inactive')
                    {
                        return ['class'=>'danger'];
                    }else
                    {
                        return ['class'=>'success'];
                    }
                },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'exposition_id',
            'exposition_title',
            'exposition_description:ntext',
            [
                'attribute' => 'exposition_image',
                'format' => 'html',
                'label' => 'Expositon Image',
                'value' => function ($data) {
                    return Html::img('/hermann/'.$data->exposition_image,
                        ['width' => '100px', 'height' => '60px']);
                },
            ],
            'exposition_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
