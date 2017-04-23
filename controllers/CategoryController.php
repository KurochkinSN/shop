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
use yii\data\Pagination;
use yii\helpers\Html;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMetaTag('E-Shoper');
        return $this->render('index', compact('hits'));
    }

    public function actionView(){
        $id = Yii::$app->request->get('id');

        $category = Category::findOne($id);
        if (empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');
        
        $products = Product::find()->where(['=', 'category_id', $id])->all();
        $query = Product::find()->where(['=', 'category_id', $id]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6, 'pageSizeParam' => false, 'forcePageParam' => false]);
        //Количество продуктов на странице можно указать 'pageSize' => 3 как сверху или $pages->setPageSize(3) как с низу
        //$pages->setPageSize(3);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMetaTag('E-Shoper | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        if (!$q) return $this->render('search', compact('products'));
        //if (!empty($search))
        {
            $query = Product::find()->where(['like', 'name', $q]);
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 3, 'pageSizeParam' => false, 'forcePageParam' => false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all();
            $this->setMetaTag('E-Shoper | Поиск: '. Html::encode($q));
            return $this->render('search', compact('products', 'pages', 'q'));
        }
    }
}