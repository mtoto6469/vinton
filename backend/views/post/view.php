<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id], [
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
            'text:ntext',
            'alert',
            'img',
            'tag',
            'keyword',
            'discription',
            [
                'attribute'=>'category',
                'value'=>function($model){

                    if($model->category == 1){

                        return 'آخرین اخبار';

                    }
                    elseif ($model->category == 2){

                        return 'آخرین سرویس ها';
                    } elseif ($model->category == 3){

                        return 'پیام های روز';
                    }

                }


            ],
            [
                'attribute'=>'enable',
                'value'=>function($model){

                    if($model->enable == 0){

                        return 'کارشناس فروش';

                    }
                    elseif ($model->enable == 1){

                        return 'کارشناس نصب';
                    } elseif ($model->enable == 2){

                        return 'کارشناس نصب درصدی';
                    }
                    elseif ($model->enable == 3){

                        return 'کارشناس ثبت نام';
                    }
                    elseif ($model->enable == 4){

                        return ' عاملین فروش';
                    }
                    elseif ($model->enable == 5){

                        return 'همه';
                    }
                }


            ],

        ],
    ]) ?>

</div>
