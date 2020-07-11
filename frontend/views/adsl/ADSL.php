<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;


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


<div style="padding: 10%">
    <?php $form = ActiveForm::begin(); ?>
    <div class="adsl-form">

        <select name="pishshomare" >
            <?php
            foreach ($pishshomare as $item){?>


            <option value="<?=$item->pishshomare;?>">

                <?=$item->pishshomare;?>

            </option>

          <?php  }
            ?>




        </select>
        
        <input name="shomare"></br>






        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'برسی پوشش دهی'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>



</div>
