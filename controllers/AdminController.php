<?php


namespace app\controllers;


use yii\web\Controller;

class AdminController extends Controller {

    public function actionIndex() {
        $this->layout = 'admin\index.php';
        return $this->render('index');
    }


}