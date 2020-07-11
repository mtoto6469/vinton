<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = Yii::t('app', 'ویرایش ثبت کاربر: {nameAttribute}', [
    'nameAttribute' => $model->name.$model->lastname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'roles'=>$roles,
        'modelupload' => $modelupload,
//        'modeluser'=>$modeluser,
        'r'=>$r,
        'reng'=>  $reng,
        'ostan'=>$ostan,
        'city'=>$city,
        'name_markaz'=> $name_markaz,
        'username'=>$username,
        'pass'=>$pass,
        'email'=>$email,
    ]) ?>

</div>
