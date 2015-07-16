<?php

use yii\helpers\Url;
use yii\widgets\ListView;
/* @var $this yii\web\View */
$this->title = 'GdeZaVikend';
?>
<div class="site-index">

<!--recommended_items-->
    <div class="recommended_items">
        <h2 class="title text-center">gde za vikend - top ponuda</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <?php $i=1; foreach ($slides as $slide): ?>
                    <div class="item <?= ($i==1)? 'active':'' ?>">   
                        <div class="product-image-wrapper fixer">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?= $slide->link ?>" title="<?= $slide->title ?>" target="_blank">
                                        <img src="<?= Url::base() ?>/img/slides/<?= $slide->image ?>" class="img-responsive" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $i++; endforeach ?>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>            
        </div>
    </div><!--/recommended_items-->

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">gde za vikend - preporuka</h2>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'item',
            'summary' => false
        ]); ?>
    </div><!--features_items-->
</div>
