<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 21.04.2017
 * Time: 10:07
 */

namespace app\controllers;
use yii\web\Controller;

class AppController extends Controller
{
    protected function setMetaTag($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}