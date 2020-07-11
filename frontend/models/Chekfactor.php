<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "chek_factor".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_factor
 * @property string $vaziyat
 * @property int $end_taeed
 * @property int $end_price
 * @property string $dalil_ekhtelaf_qeymat
 * @property int $taliq
 */
class Chekfactor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chek_factor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_factor'], 'required'],
            [['id_user', 'id_factor', 'end_taeed', 'end_price', 'taliq'], 'integer'],
            [['vaziyat', 'dalil_ekhtelaf_qeymat'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'id_factor' => Yii::t('app', 'Id Factor'),
            'vaziyat' => Yii::t('app', 'Vaziyat'),
            'end_taeed' => Yii::t('app', 'End Taeed'),
            'end_price' => Yii::t('app', 'End Price'),
            'dalil_ekhtelaf_qeymat' => Yii::t('app', 'Dalil Ekhtelaf Qeymat'),
            'taliq' => Yii::t('app', 'Taliq'),
        ];
    }

    /**
     * @inheritdoc
     * @return FQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FQuery(get_called_class());
    }
}
