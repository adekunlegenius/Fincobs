<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= \yii\helpers\Url::to(['products/index'])?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'product_name',
            'price',
            'product_bargainable',
            'front_view_image',
            'back_view_image',
            'side_view_image',
            'top_view_image',
            'description:ntext',
            'product_status',
            'user_id',
            'category',
            'no_of_views',
            'date_created',
        ],
    ]) ?>

    <p>
        <?= Yii::$app->user->getId();?>

        <?= Html::beginForm(['interests/create', 'id' => $model->product_id], 'post')
        .Html::submitButton('Show Interest', ['class'=>'btn btn-primary', 'id'=>'interest_btn'])
        . Html::endForm();?>
    </p>

</div>
</section>
<script>
    $(document).ready(function(){
        $('#interest_btn').click(function(){
            $.ajax({
                url: '<?= \Yii::$app->getUrlManager()->createUrl('interests/create') ?>',
                type: 'POST',
                data: { test: <?= $model->product_id?> },
                success: function(data) {
                    alert(data);

                }
            });
            $(this).hide();
        });
    });
</script>