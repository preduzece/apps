<?php

use yii\helpers\Url;

?>
<div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="<?= Url::base() ?>/img/offers/<?= $model->image ?>" alt="" />
                    <h2><?= $model->name ?></h2>
                    <p><?= substr($model->descript, 0, 128) ?>...</p>
                    <a href="<?= Url::to(['site/offer', 'id' => $model->id]) ?>" 
                        class="btn btn-default add-to-cart" style="margin-bottom: 15px">Vidi detalje</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2><?= $model->name ?></h2>
                        <p><?= substr($model->descript, 0, 448) ?>...</p>
                        <a href="<?= Url::to(['site/offer', 'id' => $model->id]) ?>" 
                            class="btn btn-default add-to-cart"> Vidi detalje</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
