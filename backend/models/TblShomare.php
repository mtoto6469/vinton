<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_shomare".
 *
 * @property int $id
 * @property string $name_shomare
 * @property string $type_shomare
 * @property int $number
 * @property string $ostan
 * @property string $keshvar
 * @property int $price

 * @property int $enable
 * @property int $enableview
 */
class TblShomare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_shomare';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'enable', 'enableview', 'price'], 'integer'],
            [['name_shomare', 'type_shomare', 'ostan', 'keshvar'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'name_shomare' => Yii::t('app', 'نام'),
            'type_shomare' => Yii::t('app', 'نوع شماره'),
            'number' => Yii::t('app', 'شماره'),
            'ostan' => Yii::t('app', 'استان'),
            'keshvar' => Yii::t('app', 'کشور'),
            'price' => Yii::t('app', 'قیمت'),
      
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblQuery(get_called_class());
    }
}
