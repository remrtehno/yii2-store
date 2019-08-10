<?php

namespace app\controllers;
use app\models\Cart;
use app\models\Orders;
use app\models\Products;
use yii\helpers\Json;
use yii\web\Controller;
use \Yii;



class CartController extends Controller {

  public function actionCart() {

    //get user
    $get_user = Yii::$app->session['user'];

    //get orders by user id
    $orders = Orders::find()->select('product_id')->where(['user_id' => $get_user->id])->asArray()->all();

    //get product by orders
    //$orders = Products::find()->where(['id' => [1, 4, 5]])->asArray()->all();

    return $this->render('cart', compact('orders'));
  }

  public function actionAddToCart($product_id, $count = null) {

    if ($product_id) {
      //get user
      //$get_user = Yii::$app->session['user'];

      //save into DB
//      $order_insert = new Orders();
//      $order_insert->product_id = $product_id;
//      $order_insert->user_id = $get_user->id;
//      $order_insert->status = 'pending';
//      $order_insert->save();
//    } else {
//
//      // if we not have $product_id
//      return $this->redirect(['site/error']);
//    }
//
//    return Yii::$app->runAction('cart/cart');
//
//    //return $this->render('cart');
      //}


      $session = Yii::$app->session;
      $session->open();
      $cart = new Cart();
      $cart->addCart($product_id, $count);

      return $this->render('cart');
    }
  }

  public function actionDeleteFromCart($prod_id) {
    $session = Yii::$app->session;

    if ($session->isActive && $_SESSION['cart'][$prod_id]) {
      unset($_SESSION['cart'][$prod_id]);
    }

    return $this->render('cart');
  }

  public function actionCount($prod_id, $countChange) {

    $session = Yii::$app->session;
    if ($session->isActive && $_SESSION['cart'][$prod_id]) {
      $_SESSION['cart'][$prod_id]['count'] . $countChange;
    }
  }

  public function actionProduct($id) {
      $productById = Products::find()->where(['id' => $id])->asArray()->all();
      return Json::encode($productById);
  }
}

