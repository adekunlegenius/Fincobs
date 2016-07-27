<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Products
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= \yii\helpers\Url::to(['products/index'])?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Product</li>
    </ol>
</section>
<section class="content">
    <div class="products-create">

<!--        <h1><?//= //Html::encode($this->title) ?></h1>-->


        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</section>
