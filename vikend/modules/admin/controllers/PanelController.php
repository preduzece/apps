<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class PanelController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => false,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true, 'roles' => ['@'],
                        'actions' => ['index', 'view', 'update', 'create', 'delete'],
                        'matchCallback' => function() {
                            return \Yii::$app->user->identity->role == ADMIN ;                 
                        }
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
