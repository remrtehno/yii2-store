<?php

namespace app\models;


class Cart {

  public  function addCart($prod_id, $count){

    if($_SESSION['cart'][$prod_id]){

      $_SESSION['cart'][$prod_id]['count']++;

    }else{
    $prod = Products::findOne($prod_id);

      $_SESSION['cart'][$prod_id] =
        [
          'title' => $prod->title,
          'price' => $prod->price,
          'img' => $prod->img,
          'id' => $prod->id,
          'count' => $count ? $count : "1",
        ];
    }
    //return $_SESSION['cart'];
  }


}