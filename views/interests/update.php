<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Interests */

$this->title = 'Update Interests: ' . ' ' . $model->interest_id;
$this->params['breadcrumbs'][] = ['label' => 'Interests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->interest_id, 'url' => ['view', 'id' => $model->interest_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="interests-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
