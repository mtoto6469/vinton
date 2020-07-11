<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "khadamat".
 *
 * @property int $id
 * @property string $type_bastar
 * @property string $time
 * @property string $mizan_darkhasti
 * @property int $price
 * @property int $pursant
 * @property string $sabtnam
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
            'id' => Yii::t('app', 'ID'),
            'type_bastar' => Yii::t('app', 'Type Bastar'),
            'time' => Yii::t('app', 'Time'),
            'mizan_darkhasti' => Yii::t('app', 'Mizan Darkhasti'),
            'price' => Yii::t('app', 'Price'),
            'pursant' => Yii::t('app', 'pursant'),
            'sabtnam' => Yii::t('app', 'Sabtnam'),
            'enable' => Yii::t('app', 'Enable'),
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
