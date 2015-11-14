<?php

namespace backend\controllers;

use Yii;
use backend\models\Objects;
use backend\models\ObjectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjectsController implements the CRUD actions for Objects model.
 */
class ObjectsController extends Controller
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
     * Lists all Objects models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new ObjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Objects model.
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
     * Creates a new Objects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Objects();


        if ($model->load(Yii::$app->request->post())) {

            //Set the path that the file will be uploaded to
            //$path = Yii::getAlias('@anyname') .'/';

            $imageName = $model->object_title;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs( 'uploads/'.$imageName.'.'.$model->file->extension );
            $model->object_image = 'uploads/'.$imageName.'.'.$model->file->extension;


            $model->object_created_date = date('Y-m-d h:m:s');
            $model->save();

            return $this->redirect(['view', 'id' => $model->object_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Objects model.
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

         if ($model->load(Yii::$app->request->post()) ) {
            //$path = Yii::getAlias('@anyname') .'/';
            //$path2 = Yii::getAlias('@frontend') .'/web/';
            //check if new logo has been browsed or not
            if (UploadedFile::getInstance($model,'file'))
            {
                
                //get the instance of the uploaded file
                $imageName = $model->object_title;
                $model->file =  UploadedFile::getInstance($model,'file');
                $model->file->saveAs( 'uploads/'.$imageName.'.'.$model->file->extension );
                $model->object_image = 'uploads/'.$imageName.'.'.$model->file->extension;
            }            
            $model->save();
            return $this->redirect(['view', 'id' => $model->object_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Deletes an existing Objects model.
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
     * Finds the Objects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        if (($model = Objects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
