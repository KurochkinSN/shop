<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php if (empty($session)): ?>
    <h3>Корзина пуста</h3>
<?php else:?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Фото</th>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            <?php foreach ($session['cart'] AS $product): ?>
                <tr>
                    <td><?=Html::img('@web/images/products/'. $product['img'], ['alt' => "{$product['name']}"]) ?></td>
                    <td><?=$product['name']?></td>
                    <td><?=$product['qty']?></td>
                    <td><?=$product['price']?></td>
                    <td><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Итого: </td>
                <td><?=$session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму: </td>
                <td><?=$session['cart.sum']?></td>
            </tr>
        </table>
    </div>
<?php endif; ?>