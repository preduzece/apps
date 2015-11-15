<?php

namespace app\modules\client\controllers;

use yii\web\Controller;

class PanelController extends Controller
{
    public $layout = 'client';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
