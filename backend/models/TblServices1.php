<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_services1".
 *
 * @property int $id
 * @property string $name
 * @property string $speed
 * @property string $hajm
 * @property string $time
 * @property int $price
 * @property int $pursant
 * @property int $enable
 * @property int $enableview
 * @property string $sabtnam
 * @property string $type
 */
class TblServices1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_services1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sabtnam'], 'required'],
            [['enable', 'enableview', 'price','pursant'], 'integer'],
            [['name', 'speed', 'hajm', 'time', 'sabtnam','type'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'name' => Yii::t('app', 'نام'),
            'speed' => Yii::t('app', 'سزعت'),
            'hajm' => Yii::t('app', 'حجم'),
            'time' => Yii::t('app', 'زمان'),
            'price' => Yii::t('app', 'قیمت'),
            'pursant' => Yii::t('app', 'پورسانت'),
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enableview' => Yii::t('app', 'Enableview'),
            'sabtnam' => Yii::t('app', 'نمونه خدمات'),
            'type' => Yii::t('app', 'نوع خدمات'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblServices1Query the active query used by this AR class.
     */
    public static function find()
    {
        return new TblServices1Query(get_called_class());
    }
}
