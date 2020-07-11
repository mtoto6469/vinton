<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblSemat */

$this->title = Yii::t('app', 'افزودن سمت جدید');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Semats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-semat-create">

    <h1  style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
