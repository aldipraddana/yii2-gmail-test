<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Gmail Test';
$this->params['breadcrumbs'][] = $this->title;
$randomNumber = '#'.rand(1000, 9999);
?>
<div class="site-gmail">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?php $form = ActiveForm::begin(
        [
            'id' => 'form-contact',
            'enableAjaxValidation' => true,
            'options' => [
                'class' => 'form-horizontal',
                'autocomplete' => 'off',
            ],
        ]
    ); ?>
    <div class="row">
        <div class="col-md-6">
            <h4>Email Pengirim</h4>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'host')
                    ->textInput(['autofocus' => true, 'value' => 'smtp.gmail.com'])
                    ->label('SMTP Host') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'port')
                    ->textInput(['value' => '465'])
                    ->label('SMTP Port') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'smtp_username')
                    ->textInput(['required' => true, 'value' => ''])
                    ->label('SMTP Username') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'smtp_password')
                    ->passwordInput(['required' => true, 'value' => ''])
                    ->label('SMTP Password') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'encryption')
                    ->textInput(['value' => 'tls'])
                    ->label('SMTP Encryption') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'from_email')
                    ->textInput(['placeholder' => 'pengirim@example.com'])
                    ->label('Email Pengirim') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'from_name')
                    ->textInput(['value' => 'Test'])
                    ->label('Nama Pengirim') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Email Penerima</h4>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'to_email')
                    ->textInput(['placeholder' => 'penerima@example.com'])
                    ->label('Email Penerima') ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h4>Isi Email</h4>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'subjek')
                    ->textInput(['value' => 'Test Emailing '.$randomNumber])
                    ->label('Subjek Email') ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'pesan')
                    ->textarea(['rows' => 6, 'value' => 'Ini adalah email percobaan '.$randomNumber])
                    ->label('Isi Pesan') ?>
                </div>
            </div> 
        </div>
        <div class="col-md-12">
            <?= Html::submitButton('Mulai test kirim email', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
