<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Khadamat */

$this->title = Yii::t('app', 'افزودن خدمات جدید');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Khadamats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="khadamat-create">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
 
    ]) ?>

</div>
