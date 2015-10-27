<?php

namespace backend\controllers;

use Yii;
use backend\models\Expositions;
use backend\models\ExpositionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ExpositionsController implements the CRUD actions for Expositions model.
 */
class ExpositionsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Expositions models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new ExpositionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Expositions model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Expositions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Expositions();

        if ($model->load(Yii::$app->request->post())) {


            //Set the path that the file will be uploaded to
            //$path = Yii::getAlias('@anyname') .'/';

            $imageName = $model->exposition_title;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs( 'uploads/'.$imageName.'.'.$model->file->extension );

            $model->exposition_image = 'uploads/'.$imageName.'.'.$model->file->extension;



            if ($model->exposition_status = 'active') {
                Expositions::updateAll(['exposition_status' => 'inactive'], 'exposition_status = "active"');
            } 

            $model->save();


            return $this->redirect(['view', 'id' => $model->exposition_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Expositions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $path = Yii::getAlias('@anyname') .'/';
            //check if new logo has been browsed or not
            if (UploadedFile::getInstance($model,'file'))
            {
                
                //get the instance of the uploaded file
                $imageName = $model->exposition_title;
                $model->file =  UploadedFile::getInstance($model,'file');
                $model->file->saveAs( $path.'uploads/'.$imageName.'.'.$model->file->extension );
                $model->exposition_image = 'uploads/'.$imageName.'.'.$model->file->extension;
            }
            if ($model->exposition_status = 'active') {
                Expositions::updateAll(['exposition_status' => 'inactive'], 'exposition_status = "active"');
            }          
            $model->save();


            return $this->redirect(['view', 'id' => $model->exposition_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Expositions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Expositions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expositions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        if (($model = Expositions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
