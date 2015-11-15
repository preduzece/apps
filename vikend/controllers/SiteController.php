<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Slide;
use app\models\Video;
use app\models\Catgry;

use app\models\Article;
use app\models\ArticleSearch;

use app\models\Offer;
use app\models\OfferSearch;

use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionOffer($id)
    {
        $model = Offer::findOne($id);

        return $this->render('offer', [
            'model' => $model]);
    }

    public function actionArticle($id)
    {
        $model = Article::findOne($id);

        return $this->render('article', [
            'model' => $model]);
    }

    public function actionBlog()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(
            Yii::$app->request->queryParams);

        return $this->render('blog', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGallery()
    {
        $model = Video::find();

        $dataProvider = new ActiveDataProvider([
            'pagination' => false,
            'query' => $model,
        ]);

        return $this->render('gallery', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex()
    {
        $model = Offer::find()->groupBy(['catgry'])
            ->orderBy('priority')->limit(6);

        $dataProvider = new ActiveDataProvider([
            'pagination' => false,
            'query' => $model,
        ]);

        $slides = Slide::find()->orderBy('priority')->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'slides' => $slides
        ]);
    }

    public function actionOffers($catgry=0)
    {
        $category = 'Sve ponude';

        $request = \Yii::$app->request;
        $descript = ($request->post('descript') != null)?
            $request->post('descript'):'';

        $query = Offer::find()->where(
            ['like', 'descript', $descript])->orderBy('priority');

        if ($catgry > 0) {
            $query = Offer::find()->where(
                ['catgry' => $catgry])->andWhere(
            ['like', 'descript', $descript])->orderBy('priority');

            $category = Catgry::findOne($catgry);
            $category = $category->name;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('offers', [
            'dataProvider' => $dataProvider,
            'category' => $category,
        ]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) 
            && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && 
            $model->contact(Yii::$app->params['adminEmail'])) {

            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionFeed($type='xml')
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;

        switch ($type) {
            case 'xml':
                $offers = Offer::find()->all();
                $headers->add('Content-Type', 'text/xml; charset=utf-8');

                $data = '<rss><channel>';
                $data .= '<title> *** GdeZaVikend Ponude *** </title><items>';

                foreach ($offers as $offer) {
                    $data .= '<item><name>'.$offer->name.'</name>'.
                        '<description><![CDATA['.$offer->descript.']]></description>'.
                        '<website><![CDATA['.$offer->website.']]></website>'.
                        '<published>'.$offer->added.'</published></item>';
                }

                $data .= '</items></channel>';
                $data .= '</rss>';

                echo $data;
                break;
            case 'json':

                $offers = Offer::find()
                    ->select('name, descript, website, email')
                    ->asArray()->all();

                $headers->add('Content-Type', 'application/json');

                echo json_encode($offers);
                break;
            
            default:
                echo "Requested data format is unavailible at the moment...";
                break;
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSitemap()
    {
        return $this->render('sitemap');
    }

    public function actionFriends()
    {
        return $this->render('friends');
    }

    public function actionReport()
    {
        return $this->render('report');
    }

    public function actionHost()
    {
        echo $_SERVER['HTTP_HOST'];
    }

    public function action404()
    {
        return $this->render('404');
    }
}
