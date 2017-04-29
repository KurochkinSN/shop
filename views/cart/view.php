<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
    <?php if (empty($session['cart'])): ?>
        <h3>Корзина пуста</h3>
    <?php else:?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                <?php foreach ($session['cart'] AS $id => $product): ?>
                    <tr>
                        <td><?=Html::img('@web/images/products/'. $product['img'], ['alt' => "{$product['name']}", "height" => 50]) ?></td>
                        <td><a href="<?=Url::to(['product/view', 'id' => $id])?>"></a><?=$product['name']?></td>
                        <td><?=$product['qty']?></td>
                        <td><?=$product['price']?></td>
                        <td><?=$product['price'] * $product['qty']?></td>
                        <td><span class="glyphicon glyphicon-remove text-danger del-item" data-id="<?=$id?>" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5">Итого: </td>
                    <td><?=$session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="5">На сумму: </td>
                    <td><?=$session['cart.sum']?></td>
                </tr>
            </table>
        </div>
        <hr/>
        <?php $form = ActiveForm::begin() ?>
            <?= $form->field($order, 'name')?>
            <?= $form->field($order, 'email')?>
            <?= $form->field($order, 'phone')?>
            <?= $form->field($order, 'address')?>
            <?=Html::submitButton('Заказать', ['class' => 'btn btn-success'])?>
        <?php ActiveForm::end() ?>
    <?php endif; ?>
</div>
