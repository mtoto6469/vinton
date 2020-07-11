<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_added_information".
 *
 * @property int $id
 * @property string $name
 * @property string $service
 * @property string $sabtnam
 * @property int $price
 * @property int $pursant
 * @property int $enable
 * @property int $enableview
 * @property string $speed
 * @property string $hajm
 * @property string $time
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
            [['name', 'service', 'sabtnam', 'speed', 'hajm', 'time'], 'string', 'max' => 300],
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
            'service' => Yii::t('app', 'Service'),
            'sabtnam' => Yii::t('app', 'Sabtnam'),
            'price' => Yii::t('app', 'Price'),
            'enable' => Yii::t('app', 'Enable'),
            'enableview' => Yii::t('app', 'Enableview'),
            'speed' => Yii::t('app', 'Speed'),
            'hajm' => Yii::t('app', 'Hajm'),
            'time' => Yii::t('app', 'Time'),
            'pursant' => Yii::t('app', 'pursant'),
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
