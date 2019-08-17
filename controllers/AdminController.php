<?php


namespace app\controllers;


use app\models\Orders;
use app\models\Products;
use yii\web\Controller;

class AdminController extends Controller {


    //this
//    public function init() {
//        $this->layout = 'admin\index.php';
//    }

    // or this
    public $layout = 'admin\index.php';

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionProducts() {

        $product = Products::find()->asArray()->all();

        return $this->render('products.php', compact('product'));
    }


    public function actionEditProducts($id) {


        //$product = Products::find()->asArray()->all();

        return $this->render('EditProducts.php', compact('id'));
    }

    public function actionDelProducts($id) {


        Products::find()->where(['id' => $id])->one()->delete();
        return \Yii::$app->runAction('admin/products');
    }


    public function actionOrders() {

        $item = Orders::find()->asArray()->all();
        return $this->render('default', compact('item'));
    }

}