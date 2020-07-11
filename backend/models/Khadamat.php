<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "khadamat".
 *
 * @property int $id
 * @property string $type_bastar
 * @property string $time
 * @property string $mizan_darkhasti
 * @property int $price
 * @property string $sabtnam
 * @property int $pursant
 * @property int $enable
 * @property int $enableview
 */
class Khadamat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'khadamat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_bastar', 'time', 'mizan_darkhasti', 'sabtnam'], 'required'],
            [['enable', 'enableview', 'price','pursant'], 'integer'],
            [['type_bastar', 'time', 'mizan_darkhasti', 'sabtnam'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'type_bastar' => Yii::t('app', 'نوع بستر'),
            'time' => Yii::t('app', 'زمان'),
            'mizan_darkhasti' => Yii::t('app', 'میزان درخواستی'),
            'price' => Yii::t('app', 'قیمت'),
            'pursant' => Yii::t('app', 'پورسانت'),
            'sabtnam' => Yii::t('app', ' نوع خدمات'),
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return KhadamatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KhadamatQuery(get_called_class());
    }
}
