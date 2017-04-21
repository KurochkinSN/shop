<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 20.04.2017
 * Time: 22:26
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}