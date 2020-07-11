<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblAddedInformation */

$this->title = Yii::t('app', 'ایجاد اطلاعات افزوده');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Added Informations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-added-information-create">

    <h1  style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'sabtnam' =>$sabtnam,
    ]) ?>

</div>
