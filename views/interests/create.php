<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Interests */

$this->title = 'Create Interests';
$this->params['breadcrumbs'][] = ['label' => 'Interests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>