<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSemat */
/* @var $form yii\widgets\ActiveForm */

$sesssion = Yii::$app->session;
if (!$sesssion->isActive) {
    $sesssion->open();
}
if (isset($_SESSION['error'])){
    if( $_SESSION['error']!= null){
        echo'<div class="alert alert-danger">'. $_SESSION['error'].'</div>';

    }$_SESSION['error']= null;
}
?>

<div class="tbl-semat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'semat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
