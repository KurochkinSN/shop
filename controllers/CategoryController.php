<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 21.04.2017
 * Time: 10:06
 */

namespace app\controllers;
use yii;
use app\models\Category;
use app\models\Product;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMetaTag('E-Shoper');
        return $this->render('index', compact('hits'));
    }

    public function actionView(){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['=', 'category_id', $id])->all();
        //$category = Category::find()->where(['=','id',$id])->limit(1)->all();
        $category = Category::findOne($id);
        $this->setMetaTag('E-Shoper | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'category'));
    }
}