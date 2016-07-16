<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username', ['options'=>[
        'tag'=>'div',
        'class'=>'form-group field-loginform-username has-feedback required'],
        'template'=>'{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        {error}{hint}'
    ])->textInput(['placeholder' => 'username']) ?>

    <?= $form->field($model, 'password', ['options'=>[
        'tag'=>'div',
        'class'=>'form-group field-loginform-password has-feedback required'],
        'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        {error}{hint}'
    ])->passwordInput(['placeholder'=>'password']) ?>

    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
        </div>
        <div class="col-xs-4">
        <?= Html::submitButton('Login', ['class' => "btn btn-primary btn-block btn-flat", 'name' => 'login-button']) ?>
        </div>
    </div>

    <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
            Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <?= Html::a('I forgot my password',['site/request-password-reset']) ?><br>
    <?= Html::a('Register a new membership',['site/signup']) ?>

    <?php ActiveForm::end(); ?>

<!--    <div class="col-lg-offset-1" style="color:#999;">-->
<!--        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
<!--        To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
<!--    </div>-->

