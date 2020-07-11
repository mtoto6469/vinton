<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblTarget */

$this->title = Yii::t('app', 'تارگت فروش');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Targets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-target-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'ostan'=>$ostan,
        'reng'=>   $reng,
        'searchModel' =>$searchModel,
        'dataProvider'=>$dataProvider,
    ]) ?>

</div>
