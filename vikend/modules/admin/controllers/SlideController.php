<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Slide;
use app\modules\admin\models\SlideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
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

    /**
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slide model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slide();
        $model->created = date("Y-m-d H:i:s");
        $request = Yii::$app->request;

        if ($request->isPost) {
            $model->load($request->post());
            
            $uploadedImage = UploadedFile::getInstance($model, 'image');

            if ($uploadedImage != null) {
               $model->image = $uploadedImage->name;
            } else {
                $model->addError('image', 'Slika ne moze biti prazna!');
            }

            if ($model->validate() && $model->save()) {

                $uploadedImage->saveAs('img/slides/' . $uploadedImage->name);

                return $this->redirect(
                    ['view', 'id' => $model->id]);
            } else {

                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Slide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;

        if (Yii::$app->request->isPost) {

            $model->load(Yii::$app->request->post()); 

            $uploadedImage = UploadedFile::getInstance($model, 'image');

            if ($uploadedImage != null) {
               $model->image = $uploadedImage->name;
            } else {
                $model->image = $oldImage;
            }

            if ($model->validate() && $model->save()) {

                if ($uploadedImage != null) {

                    unlink('img/slides/'.$oldImage);
                    $uploadedImage->saveAs('img/slides/' . $uploadedImage->name);
                }

                return $this->redirect(['view', 'id' => $model->id]);
            } else {

                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
                
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slide model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);

        if ($model->delete()){

            unlink('img/slides/'.$model->image);
            return $this->redirect(['index']);
        } else {

            echo 'Error deleting a file: '.'img/slides/'.$model->image;
        }
    }

    /**
     * Finds the Slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slide::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
