<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    <div class="alert alert-success">
        Thank you for contacting us. We will respond to you as soon as possible.
    </div>

    <?php endif ?>

    <h2 class="title text-center">Gde za vikend - Kontakt</h2>
    <div class="contact-info fixer">
        <address>
            <p>Gde za vikend - web portal - www.gdezavikend.rs</p>
            <p>Drzava - Grad: Srbija - Beograd</p>
            <p>Mobile: +381652423969</p>
            <p>Fax: +381652423969</p>
            <p>Email: info@gdezavikend.rs</p>
        </address>
    </div>

    <h2 class="title text-center">Posaljite poruku</h2>
    <div class="contact-form fixer">
        <div class="status alert alert-success" style="display: none"></div>

        <?php $form = ActiveForm::begin(['id' => 'contact-form',
            'options' => ['class' => 'contact-form row']]); ?>

            <div class="form-group col-md-6">
                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Ime Prezime'])->label(false) ?>
            </div>

            <div class="form-group col-md-6">
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email adresa'])->label(false) ?>
            </div>

            <div class="form-group col-md-12">
                <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Naslov poruke'])->label(false) ?>
            </div>

            <div class="form-group col-md-12">
                <?= $form->field($model, 'body')->textArea(['rows' => 8, 'placeholder' => 'Vasa poruka...'])->label(false) ?>
            </div>

            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-md-4">{image}</div><div class="col-md-8">{input}</div></div>',
                        ]) ?>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group text-right">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
                        </div>
                    </div>
                </div>
            </div> 
        <?php ActiveForm::end(); ?>
    </div>

    <div class="social-networks">
        <h2 class="title text-center">Društvene mreže</h2>
        <ul class="social-icons">
            <li><a href="https://www.facebook.com/gdezavikend1"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCPh-kvuQ4RijUYBQtQpzxBA"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://plus.google.com/u/0/b/101770396487292153275/101770396487292153275/about">
                <i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
</div>
