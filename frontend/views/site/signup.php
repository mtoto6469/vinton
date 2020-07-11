<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'roles')->dropDownList($roles,['prompt'=>'نقش کاربر را مشخص کنید.'])->label('') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('پسورد') ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'semat')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'namepedar')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'codemeli')->textInput() ?>

                <?= $form->field($model, 'cellphone')->textInput() ?>

                <?= $form->field($model, 'phone')->textInput() ?>

                <?= $form->field($model, 'id_phone')->textInput() ?>

                <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'saatkari_az')->textInput() ?>

                <?= $form->field($model, 'saatkari_ta')->textInput() ?>

                <?= $form->field($model, 'shomarepersenel')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'eshterak')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'nahveashnaee')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'ax_perseneli')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'ax_kartmeli')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'adress')->textInput(['autofocus' => true])->label('آدرس را وارد کنید')  ?>

                <?= $form->field($model, 'tarikhsabt_karmand')->textInput() ?>

                <?= $form->field($model, 'tarikhsabt_karmand2')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
