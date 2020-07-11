<?php

namespace frontend\models;

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
            [['sabtnam'], 'required'],
            [['name_shomare', 'type_shomare', 'ostan', 'keshvar' ], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_shomare' => Yii::t('app', 'Name Shomare'),
            'type_shomare' => Yii::t('app', 'Type Shomare'),
            'number' => Yii::t('app', 'Number'),
            'ostan' => Yii::t('app', 'Ostan'),
            'keshvar' => Yii::t('app', 'Keshvar'),
            'price' => Yii::t('app', 'Price'),
            'enable' => Yii::t('app', 'Enable'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblShomareQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblShomareQuery(get_called_class());
    }
}
