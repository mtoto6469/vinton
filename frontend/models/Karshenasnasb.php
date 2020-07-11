<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "karshenasnasb".
 *
 * @property int $id
 * @property int $id_user
 * @property string $vaziyat_nasb
 * @property string $nahve_pardakht
 * @property string $name_wifi
 * @property string $password
 * @property string $eshterak
 * @property string $sabtnam
 * @property string $type_qarardad
 * @property string $dalil
 * @property string $ax_emza
 * @property string $be_tarikh
 * @property string $b_saat
 * @property string $ax1
 * @property string $ax2
 * @property string $ax3
 * @property string $ax4
 * @property string $molahezat
 * @property string $tozihat
 */
class Karshenasnasb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karshenasnasb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'nahve_pardakht', 'eshterak', 'sabtnam', 'type_qarardad'], 'required'],
            [['id_user'], 'integer'],
            [['vaziyat_nasb'], 'string', 'max' => 300],
            [['nahve_pardakht', 'type_qarardad'], 'string', 'max' => 10],
            [['name_wifi', 'password', 'eshterak', 'sabtnam', 'dalil', 'ax_emza', 'be_tarikh', 'b_saat', 'ax1', 'ax2', 'ax3', 'ax4', 'molahezat', 'tozihat'], 'string', 'max' => 400],
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
            'vaziyat_nasb' => Yii::t('app', 'Vaziyat Nasb'),
            'nahve_pardakht' => Yii::t('app', 'Nahve Pardakht'),
            'name_wifi' => Yii::t('app', 'Name Wifi'),
            'password' => Yii::t('app', 'Password'),
            'eshterak' => Yii::t('app', 'Eshterak'),
            'sabtnam' => Yii::t('app', 'Sabtnam'),
            'type_qarardad' => Yii::t('app', 'Type Qarardad'),
            'dalil' => Yii::t('app', 'Dalil'),
            'ax_emza' => Yii::t('app', 'Ax Emza'),
            'be_tarikh' => Yii::t('app', 'Be Tarikh'),
            'b_saat' => Yii::t('app', 'B Saat'),
            'ax1' => Yii::t('app', 'Ax1'),
            'ax2' => Yii::t('app', 'Ax2'),
            'ax3' => Yii::t('app', 'Ax3'),
            'ax4' => Yii::t('app', 'Ax4'),
            'molahezat' => Yii::t('app', 'Molahezat'),
            'tozihat' => Yii::t('app', 'Tozihat'),
        ];
    }

    /**
     * @inheritdoc
     * @return KarshenasnasbQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KarshenasnasbQuery(get_called_class());
    }
}
