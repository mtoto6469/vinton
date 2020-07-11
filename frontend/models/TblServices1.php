<?php

namespace frontend\models;

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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'speed' => Yii::t('app', 'Speed'),
            'hajm' => Yii::t('app', 'Hajm'),
            'time' => Yii::t('app', 'Time'),
            'price' => Yii::t('app', 'Price'),
            'pursant' => Yii::t('app', 'pursant'),
            'enable' => Yii::t('app', 'Enable'),
            'enableview' => Yii::t('app', 'Enableview'),
            'sabtnam' => Yii::t('app', 'Sabtnam'),
            'type' => Yii::t('app', 'type'),
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
