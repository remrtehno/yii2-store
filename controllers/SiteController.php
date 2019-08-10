<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Products;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;


class SiteController extends Controller
{



    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $products = Products::find()->asArray()->all();
        $cats = Categories::find()->asArray()->all();
        return $this->render('index', compact('products', 'cats'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
           // return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
          //  return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        //Yii::$app->user->logout();
        $session = Yii::$app->session;
      if ($session->isActive) {
        $session->close();
        $session->destroy();
      }

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


  public function actionNew_user() {


    //get POST
    $name =  Yii::$app->request->post('name');
    $email =  Yii::$app->request->post('email');
    $password =  Yii::$app->request->post('password');

    $get_user  = Users::findOne(['name' => $name]);


    if(empty($name) && empty($password)) {
      \Yii::$app->session->setFlash('error', "User name must be filled");
      return  $this->render('logged');
    }

    if($get_user) {
     // \Yii::$app->session->setFlash('error', "User already exist");
      return  $this->render('logged');
    }


    //save into comment
    $comments_insert = new Users();
    $comments_insert->name = $name;
    $comments_insert->email = $email;
    $comments_insert->paasword = $password;
    $comments_insert->role = '';
    $comments_insert->save();


    \Yii::$app->session->setFlash('success', "Welcome, new user created");
    return  $this->render('logged');
  }

  public function actionSignIn() {

    //get POST
    $name =  Yii::$app->request->post('name');
    $password =  Yii::$app->request->post('password');

    //get user
    $get_user  = Users::findOne(['name' => $name, 'paasword' => $password, ]);
    //$user = Users::find()->where(['name' => 'admin', 'paasword' => 2])->asArray()->one(); //this identical that above


    $session = Yii::$app->session;
    $session->open();

    //if user is right
    if($get_user) {
      $session['user'] = $get_user;
      //$user = $session['user'];
      return $this->goHome();
    } else {
      Yii::$app->session['error'] = 'User name or password is wrong';
    }
    return  $this->render('login', compact('user'));
  }

  public function actionExit()
  {
    //Yii::$app->user->logout();

    $session = Yii::$app->session;
    if ($session->isActive) {
      Yii::$app->session->remove('user');
      $session->close();
      $session->destroy();
    }

    return $this->goHome();
  }


  public function actionGetProductByAjax ($id) {
      $productById = Products::find()->where(['id' => $id])->asArray()->all();
      return Json::encode($productById);
  }

}
