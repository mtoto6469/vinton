<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "domain".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $time
 * @property string $price
 * @property string $discription
 * @property string $dns
 * @property string $dns2
 * @property int $enable
 * @property int $enableview
 */
class Domain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'time'], 'required'],
            [['enable', 'enableview'], 'integer'],
            [['type', 'name', 'time', 'price','dns','dns2'], 'string', 'max' => 300],
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
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'time' => Yii::t('app', 'Time'),
            'price' => Yii::t('app', 'Price'),
            'dns' => Yii::t('app', 'dns'),
            'dns2' => Yii::t('app', 'dns'),
            'discription' => Yii::t('app', 'Discription'),
            'enable' => Yii::t('app', 'Enable'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return DomainQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DomainQuery(get_called_class());
    }
}
