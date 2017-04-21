<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 20.04.2017
 * Time: 22:39
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }
}