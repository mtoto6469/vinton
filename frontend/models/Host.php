<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "host".
 *
 * @property int $id
 * @property string $name
 * @property string $faza
 * @property string $time
 * @property string $terafik
 * @property string $systemamel
 * @property string $controll_panel
 * @property string $pahnayeband
 * @property string $pursant
 * @property string $price
 * @property string $discription
 * @property int $enable
 * @property int $enableview
 */
class Host extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'host';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'faza', 'time', 'terafik', 'systemamel', 'controll_panel', 'pahnayeband'], 'required'],
            [['enable', 'enableview','pursant'], 'integer'],
            [['name', 'faza', 'time', 'terafik', 'systemamel', 'controll_panel', 'pahnayeband', 'price'], 'string', 'max' => 300],
            [['discription'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'faza' => Yii::t('app', 'Faza'),
            'time' => Yii::t('app', 'Time'),
            'terafik' => Yii::t('app', 'Terafik'),
            'systemamel' => Yii::t('app', 'Systemamel'),
            'controll_panel' => Yii::t('app', 'Controll Panel'),
            'pahnayeband' => Yii::t('app', 'Pahnayeband'),
            'price' => Yii::t('app', 'Price'),
            'pursant' => Yii::t('app', 'pursant'),
            'discription' => Yii::t('app', 'Discription'),
            'enable' => Yii::t('app', 'Enable'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return HostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HostQuery(get_called_class());
    }
}
