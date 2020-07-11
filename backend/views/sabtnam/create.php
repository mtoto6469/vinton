<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sabtnam */

$this->title = Yii::t('app', 'ایجاد منوی ثبت نام');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sabtnams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sabtnam-create">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
