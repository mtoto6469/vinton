<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hoze_faaliyat".
 *
 * @property int $id
 * @property string $name
 * @property string $discription
 * @property int $enable
 * @property int $enableview
 */
class Hozefaaliyat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hoze_faaliyat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['enable', 'enableview'], 'integer'],
            [['name'], 'string', 'max' => 300],
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
            'discription' => Yii::t('app', 'Discription'),
            'enable' => Yii::t('app', 'Enable'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return HozeFaaliyatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HozeFaaliyatQuery(get_called_class());
    }
}
