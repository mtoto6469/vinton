<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblCoordinates */

$this->title = 'تعریف نقاط یک منطقه';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Coordinates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-coordinates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        "range"=>$range
    ]) ?>

</div>
