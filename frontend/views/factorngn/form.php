<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FactorNgn */
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
<?php

$url=Yii::$app->urlManager;
?>

<div class="factor-ngn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>


<!--    <div class="form-group field-adsl-type required">-->
<!--        <label class="control-label" for="adsl-type">type</label>-->
<!--        <input id="adsl-type" class="form-control" name="Adsl[type]" value="--><?//=$type?><!--" aria-required="true" type="text">-->
<!---->
<!--        <div class="help-block"></div>-->
    </div>
    <input value="<?=$ranzh?>">

    <?= $form->field($model, 'eshterak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli')->textInput() ?>

    <?= $form->field($model, 'shenasname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarikh_tavalod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mahale_sodur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput() ?>

    <?= $form->field($model, 'cellphone2')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code_posti')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shomare_asiyatek')->textInput() ?>

    <?= $form->field($model, 'id_tblshomare')->textInput() ?>

    <?= $form->field($model, 'shomare_darkhasti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_services')->textInput() ?>

    <?= $form->field($model, 'id_added')->textInput() ?>

    <?= $form->field($model, 'discription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date_farsi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
