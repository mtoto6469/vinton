<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblRange */

$this->title = 'ایجاد منطقه جدید';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Ranges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-range-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
