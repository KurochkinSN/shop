<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Cart extends ActiveRecord{
    public function addToCard($product, $qty = 1){
        if (isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }

    public function recall($id){
        if (!isset($_SESSION['cart'][$id])){
            return false;
        }else{
            $qtyMinus = $_SESSION['cart'][$id]['qty'];
            $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
            $_SESSION['cart.qty'] -= $qtyMinus;
            $_SESSION['cart.sum'] -= $sumMinus;
            unset ($_SESSION['cart'][$id]);
        }
    }
}