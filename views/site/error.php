<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="container text-center">
    <div class="logo-404">
        <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
    </div>
    <div class="content-404">
        <img src="/images/404/404.png" class="img-responsive" alt="" />
        <h1><b>OPPS!</b><?= Html::encode($this->title) ?></h1>
        <p><?= nl2br(Html::encode($message)) ?></p>
        <h2><a href="<?=\yii\helpers\Url::home()?>">Перейти на главную страницу</a></h2>
    </div>
</div>
