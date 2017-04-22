<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 22.04.2017
 * Time: 12:35
 */

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use yii;


class ProductController extends AppController
{
    public function actionView($id){
        $id = Yii::$app->request->get('id');
        //$product = Product::findOne($id); //<-ленивая загрузка
        $product = Product::find()->with('category')->where(['=' ,'id', $id])->asArray()->limit(1)->one();
        if (empty($product))
            throw new \yii\web\HttpException(404, 'Такого товара нет');

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->asArray()->all();
        $this->setMetaTag('E-Shoper | ' . $product['name'], $product['keywords'], $product['description']);
        return $this->render('view', compact('product','hits'));
    }
}