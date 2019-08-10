<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Category;
use app\models\Products;
use yii\web\Controller;


class CategoryController extends Controller {
  public function actionView ($id) {

    //$categoriesArr = Categories::find()->asArray()->all();
    //$product = Products::find()->where(['cat_id'=>Array(1,5)])->asArray()->all();
    $productAll = Products::find()->asArray()->all();
    $product = array();

    foreach ($productAll as $item) {
      $ar = explode(',', $item['cat_id']);
      if(in_array($id, $ar)) {
        array_push($product, $item);
      }

    };
    return $this->render('view', compact('product' ));
  }



}
