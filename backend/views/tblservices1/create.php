<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblServices1 */

$this->title = Yii::t('app', 'ایجاد سرویس اطلاعات');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Services1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-services1-create">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'sabtnam'=> $sabtnam,
    ]) ?>

</div>
