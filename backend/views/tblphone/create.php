<?php

use yii\helpers\Html;
use  yii\Session;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPhone */

$this->title = Yii::t('app', 'ایجاد پیش شماره');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="tbl-phone-create">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sabtnam' =>$sabtnam,
        'ostan' =>$ostan,
       
    ]) ?>

</div>
