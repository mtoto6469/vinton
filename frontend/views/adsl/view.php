<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Adsl */

$this->title = $model->eshterak;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Adsls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div  style="margin:2%; text-align: right">
<div class="adsl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'type',
             ['attribute'=>'eshterak',

                 'value'=>function($model){
                 if($model->type == 'adsl' || $model->type == 'vdsl'){

                     $exploade=explode('_',$model->eshterak);
                     $pishshomare= $exploade[1];
                     $shomare=$exploade[0];
                     $eshterak=\frontend\models\TblPhone::find()->where(['pishshomare'=>$pishshomare])->all();

                     foreach ($eshterak as $item){

                         if( $shomare>=$item->reng_az  && $shomare<= $item->reng_ta ){

                             return $item->name_markaz;

                         }
                         return "no";
                     }

                 }
                     return $model->eshterak;

                 }




             ],
            'id_user',
            [
                'attribute'=>'vazeyat_sabt',
                'value'=>function($model){

                    if($model->vazeyat_sabt== 1){

                        return 'ثبت نام شد.';


                    }


                    return 'پیش ثبت نام';


                }
            ],
            'name',
            'lastname',
            'codemeli',
            'shenasname',
            'tarikh_tavalod',
            'mahale_sodur',
            'name_malek',
            'lastname_malek',
            'codemeli_malek',
            'cellphone',
            'cellphone2',
            'telegram',
            'phone',
            'adress',
            'codeposti',
            'email:email',
            'ax_shenasaee',
            'ax_emza',
            'discription',
            'ersal_barge_telegram',
            'ersal_mablaq_payamak',
            'id_services',
            'id_added',

            'price',
        ],
    ]) ?>

</div>
</div>
