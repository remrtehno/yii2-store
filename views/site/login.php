<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use  yii\web\Session;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
//redirect exampe   Yii::$app->response->redirect(['site/view']);

if(isset(Yii::$app->session['error'])) {
echo Yii::$app->session['error'];
};

Yii::$app->session->remove('error'); ?>




<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="<?= \yii\helpers\Url::to(['site/sign-in'])?>" method="post">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <input name="name" type="text" placeholder="Name" />
                        <input name="password" type="text" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="<?= \yii\helpers\Url::to(['site/new_user'])?>" method="post">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <input type="text" placeholder="Name" name="name"/>
                        <input type="email" placeholder="Email Address" name="email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->





<!--<div class="site-login">-->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    --><?php //$form = ActiveForm::begin([
//        'id' => 'login-form',
//        'layout' => 'horizontal',
//        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//        ],
//    ]); ?>
<!---->
<!--        --><?//= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!---->
<!--        --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--        --><?//= $form->field($model, 'rememberMe')->checkbox([
//            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
//        ]) ?>
<!---->
<!--        <div class="form-group">-->
<!--            <div class="col-lg-offset-1 col-lg-11">-->
<!--                --><?//= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!---->
<!--    <div class="col-lg-offset-1" style="color:#999;">-->
<!--        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
<!--        To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
<!--    </div>-->
<!--</div>-->




