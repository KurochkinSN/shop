<?php
use app\components\MenuWidget;
use app\components\ProductWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
?>
<section id="advertisement">
    <div class="container">
        <img src="/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>

                    <ul class="catalog category-products">
                        <?= MenuWidget::widget(['style' => 'menu']) ?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <?php if (!empty($products)): ?>
                        <h2 class="title text-center">Результат поиска: "<?= Html::encode($q) ?>"</h2>
                        <?php $i=0; foreach ($products as $product): ?>
                            <?= ProductWidget::widget(['style' => 'product', 'product'=> $product]) ?>
                            <?php $i++; echo (($i % 3 == 0)?'<div class="clearfix"></div>':'') ?>
                        <?php endforeach; ?>
                        <?php
                        echo '<div class="clearfix"></div>';
                        // display pagination
                        echo LinkPager::widget(['pagination' => $pages,]);
                        ?>
                    <?php else:?>
                        <h2>Товар не найден</h2>
                    <?php endif; ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
