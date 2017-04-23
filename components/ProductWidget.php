<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 23.04.2017
 * Time: 10:18
 */

namespace app\components;
use yii\base\Widget;
use yii;

class ProductWidget extends Widget
{
    public $product;
    public $style;

    public function init()
    {
        parent::init();
        if ($this->style === null){
            $this->style = 'product';
        }
        $this->style .= '.php';
    }
    
    public function run(){
        ob_start();
        include __DIR__ . '/product_style/' . $this->style;
        return ob_get_clean();
    }

}