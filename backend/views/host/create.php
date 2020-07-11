<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Host */

$this->title = Yii::t('app', 'ایجاد پنل جدید');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hosts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="host-create">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
