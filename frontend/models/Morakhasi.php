<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "morakhasi".
 *
 * @property int $id
 * @property int $id_user
 * @property string $date
 * @property string $date_farsi
 * @property string $az_saat
 * @property string $ta_saat
 * @property string $sum
 * @property string $dalil
 * @property string $ax_emza
 * @property int $taeed
 * @property string $vaziyat
 * @property int $ruzane
 */
class Morakhasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'morakhasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'date', 'date_farsi', 'sum', 'ax_emza'], 'required'],
            [['id_user', 'taeed', 'ruzane'], 'integer'],
            [['date'], 'safe'],
            [['date_farsi', 'az_saat', 'ta_saat', 'sum', 'ax_emza'], 'string', 'max' => 300],
            [['dalil', 'vaziyat'], 'string', 'max' => 600],
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
            'date' => Yii::t('app', 'Date'),
            'date_farsi' => Yii::t('app', 'Date Farsi'),
            'az_saat' => Yii::t('app', 'Az Saat'),
            'ta_saat' => Yii::t('app', 'Ta Saat'),
            'sum' => Yii::t('app', 'Sum'),
            'dalil' => Yii::t('app', 'Dalil'),
            'ax_emza' => Yii::t('app', 'Ax Emza'),
            'taeed' => Yii::t('app', 'Taeed'),
            'vaziyat' => Yii::t('app', 'Vaziyat'),
            'ruzane' => Yii::t('app', 'Ruzane'),
        ];
    }

    /**
     * @inheritdoc
     * @return MorakhasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MorakhasiQuery(get_called_class());
    }
}
