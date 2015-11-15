<?php

namespace app\modules\blog\controllers;

use Yii;
use app\modules\blog\models\Article;
use app\modules\blog\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
                            return \Yii::$app->user->identity->role == WRITER ;
                        }
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if (Yii::$app->request->isPost) {

            $model->load(Yii::$app->request->post());
            $model->created = date('Y-m-d H:i:s');

            $uploadedImage = UploadedFile::getInstance($model, 'image');

            if ($uploadedImage != null) {
               $model->image = $uploadedImage->name;
            } else {
                $model->addError('image', 'Slika ne moze biti prazna!');
            }

            if ($model->validate() && $model->save()) {

                $uploadedImage->saveAs('img/articles/' . $uploadedImage->name);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else
            return $this->render('create', [
                    'model' => $model,
                ]);
    }

    /**
     * Updates an existing Article model.
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

                    unlink('img/articles/'.$oldImage);
                    $uploadedImage->saveAs('img/articles/' . $uploadedImage->name);
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
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);

        if ($model->delete()){

            unlink('img/articles/'.$model->image);
            return $this->redirect(['index']);
        } else {

            echo 'Error deleting a file: '.'img/articles/'.$model->image;
        }
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(
                'The requested page does not exist.');
        }
    }
}
