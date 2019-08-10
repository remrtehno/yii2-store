<?php
namespace app\models;
use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{


  public static function tableName()
  {
    return "orders";
  }



}