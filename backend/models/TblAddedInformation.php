<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_added_information".
 *
 * @property int $id
 * @property string $name
 * @property string $service
 * @property string $sabtnam
 * @property string $speed
 * @property string $hajm
 * @property string $time
 * @property int $price
 * @property int $pursant
 * @property string $enable
 * @property string $enableview
 */
class TblAddedInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_added_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sabtnam'], 'required'],
            [['enable', 'enableview', 'price','pursant'], 'integer'],
            [['name', 'service', 'sabtnam'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'name' => Yii::t('app', 'نام خدمات'),
            'service' => Yii::t('app', 'نوع خدمات'),
            'sabtnam' => Yii::t('app', 'منوی ثبت نام'),
            'price' => Yii::t('app', 'قیمت'),
            'pursant' => Yii::t('app', 'پورسانت'),
          
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblAddedInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblAddedInformationQuery(get_called_class());
    }
}
