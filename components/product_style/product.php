<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <?= Html::img('@web/images/products/'. $this->product['img'], ['alt' => "{$this->product['name']}"]) ?>
                <h2>$<?=$this->product['price']?></h2>
                <a href="<?=Url::to(['product/view', 'id' => $this->product['id']])?>"><p><?=$this->product['name']?></p></a>
                <a href="<?=Url::to(['cart/add', 'id' => $this->product['id']])?>" data-id="<?=$this->product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <!--                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$<?/*=$hit->price*/?></h2>
                                        <p><?/*=$hit->name*/?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>-->
            <?php echo (($this->product['new'] === '1')?Html::img('@web/images/options/new.png', ['class' => 'new', 'alt' => 'новинка']):(($this->product['sale'] === '1')?Html::img('@web/images/options/sale.png', ['class' => 'new', 'alt' => 'распродажа']):'')); ?>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>