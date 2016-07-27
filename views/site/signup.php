<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <p>Please fill out the following fields to signup:</p>-->

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

<?= $form->field($model, 'fullname', ['options'=>[
    'tag'=>'div',
    'class'=>'form-group field-signupform-fullname has-feedback required'],
    'template'=>'{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        {error}{hint}'

])->textInput(['placeholder' => 'Full name']) ?>

<?= $form->field($model, 'username', ['options'=>[
    'tag'=>'div',
    'class'=>'form-group field-signupform-username has-feedback required'],
    'template'=>'{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        {error}{hint}'

])->textInput(['placeholder' => 'Choose a username']) ?>

<?= $form->field($model, 'email', ['options'=>[
    'tag'=>'div',
    'class'=>'form-group field-signupform-email has-feedback required'],
    'template'=>'{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        {error}{hint}'
])->textInput(['placeholder' => 'Email']) ?>

<?= $form->field($model, 'password', ['options'=>[
    'tag'=>'div',
    'class'=>'form-group field-signupform-password has-feedback required'],
    'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        {error}{hint}'
])->passwordInput(['placeholder'=>'password']) ?>

<?= $form->field($model, 'retype_password', ['options'=>[
    'tag'=>'div',
    'class'=>'form-group field-signupform-password has-feedback required'],
    'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        {error}{hint}'
])->passwordInput(['placeholder'=>'Retype password']) ?>

<?= $form->field($model, 'phone_no', ['options'=>[
    'tag'=>'div',
    'class'=>'form-group field-signupform-phone_no has-feedback required'],
    'template'=>'{input}<span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                        {error}{hint}'
])->textInput(['placeholder'=>'Phone no']) ?>

<div class="form-group">
    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'signup-button']) ?>
</div>
<div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
</div>

<?= Html::a('I already have an account',['/site/login'],['class'=>'text-center'])?>


<?php ActiveForm::end(); ?>

