<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
?>


<?php if(yii::$app->session->hasFlash('success')){
    echo yii::$app->session->getFlash('success');
}?>


<div style="position: absolute; top: 100px; right:15%; ">
<?php $form = ActiveForm::begin();?>
<?= $form->field($model,'name');?>
<?= $form->field($model,'email');?>

<?= Html::submitButton('submit',['class'=>'btn btn-success' ]);?>


</div>