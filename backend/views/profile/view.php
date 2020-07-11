<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حدف'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'lastname',

            [
                'attribute' => 'semat',

                'value'=> function ($model) {
                    if($model->semat == '0')
                    {

                        return 'کارشناس فروش';

                    }
                    elseif ($model->semat== '1') {
                        return 'کارشناس نصب';
                    }
                    elseif ($model->semat== '2') {
                        return 'کارشناس نصب درصدی';
                    }
                    elseif ($model->semat== '3') {
                        return 'کارشناس ثبت نام';
                    }
                    elseif ($model->semat== '4') {
                        return 'عاملین فروش';
                    }

                },
            ],
            'namepedar',
            'codemeli',
            'id_user',
            'cellphone',
            'phone',
            [
                'attribute' =>  'id_phone',

                'value'=> function ($model) {

                        $markaz_name=\backend\models\TblPhone::find()->where(['id'=>$model->id_phone])->one();
                    if($markaz_name!= null){
                        return $markaz_name->name_markaz;
                    }





                },
            ],

            [
                'attribute' => 'id_mantaqe',

                'value'=> function ($model) {

                        $mantaqe_name=\backend\models\TblRange::find()->where(['id'=>$model->id_mantaqe])->one();

                    if($mantaqe_name!= null){
                        return $mantaqe_name->name;
                    }



                },
            ],


            'saatkari_az',
            'saatkari_ta',
            'shomarepersenel',
            'hoquq',
        

            'ax_perseneli',
            'ax_kartmeli',
            'adress',
//            'tarikhsabt_karmand',
            'tarikhsabt_karmand2',
        ],
    ]) ?>

</div>
