<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblShomare */

$this->title = Yii::t('app', 'جدول شماره');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Shomares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-shomare-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
   
//        'ostan'=> $ostan,
    ]) ?>

</div>
