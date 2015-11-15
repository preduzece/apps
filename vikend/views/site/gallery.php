<?php
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
$this->title = 'Galerija';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="blog-post-area">

    <h2 class="title text-center">Galerija</h2>
	<?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'video',
        'summary' => false
    ]); ?>
</div>
