<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 20.04.2017
 * Time: 22:46
 */

namespace app\components;
use yii\base\Widget;
use app\models\Category;
use yii;

class MenuWidget extends Widget
{
    public $style;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if ($this->style === null){
            $this->style = 'menu';
        }
        $this->style .= '.php';
    }

    public function run()
    {
        //get cache
        $menu = Yii::$app->cache->get('menu');
        if ($menu) return $menu;

        $this->data = Category::find()->indexBy('id')->asArray()->all(); //indexBy('id') при сормировании массив используються ключи из поля id
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        //set cache
        Yii::$app->cache->set('menu', $this->menuHtml, 60);
        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category){
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category){
        ob_start();
        include __DIR__ . '/menu_style/' . $this->style;
        return ob_get_clean();
    }
}