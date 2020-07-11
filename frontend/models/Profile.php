<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $semat
 * @property string $namepedar
 * @property string $codemeli
 * @property int $id_user
 * @property string $cellphone
 * @property int $phone
 * @property int $id_phone
 * @property int $id_mantaqe
 * @property string $saatkari_az
 * @property string $saatkari_ta
 * @property string $shomarepersenel
 * @property string $nahveashnaee
 * @property string $ax_perseneli
 * @property string $ax_kartmeli
 * @property string $adress
 * @property string $timeWork
 * @property string $tarikhsabt_karmand
 * @property string $tarikhsabt_karmand2
 * @property string $shahr
 * @property string $ostan
 * @property int $enableview
 * @property int $hoquq
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'semat', 'namepedar', 'codemeli', 'id_user', 'cellphone', 'phone', 'saatkari_az', 'saatkari_ta', 'shomarepersenel', 'tarikhsabt_karmand', 'shahr', 'ostan'], 'required'],
            [['codemeli', 'id_user', 'cellphone', 'phone', 'id_phone', 'id_mantaqe', 'enableview', 'hoquq'], 'integer'],
            [['tarikhsabt_karmand'], 'safe'],
            [['name', 'lastname', 'semat', 'namepedar', 'saatkari_az', 'saatkari_ta', 'shomarepersenel', 'nahveashnaee', 'ax_perseneli', 'ax_kartmeli', 'tarikhsabt_karmand2', 'shahr', 'ostan'], 'string', 'max' => 400],
            [['adress'], 'string', 'max' => 500],
            [['timeWork'], 'string', 'max' => 255],
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
            'lastname' => Yii::t('app', 'Lastname'),
            'semat' => Yii::t('app', 'Semat'),
            'namepedar' => Yii::t('app', 'Namepedar'),
            'codemeli' => Yii::t('app', 'Codemeli'),
            'id_user' => Yii::t('app', 'Id User'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'phone' => Yii::t('app', 'Phone'),
            'id_phone' => Yii::t('app', 'Id Phone'),
            'id_mantaqe' => Yii::t('app', 'Id Mantaqe'),
            'saatkari_az' => Yii::t('app', 'Saatkari Az'),
            'saatkari_ta' => Yii::t('app', 'Saatkari Ta'),
            'shomarepersenel' => Yii::t('app', 'Shomarepersenel'),
            'nahveashnaee' => Yii::t('app', 'Nahveashnaee'),
            'ax_perseneli' => Yii::t('app', 'Ax Perseneli'),
            'ax_kartmeli' => Yii::t('app', 'Ax Kartmeli'),
            'adress' => Yii::t('app', 'Adress'),
            'tarikhsabt_karmand' => Yii::t('app', 'Tarikhsabt Karmand'),
            'tarikhsabt_karmand2' => Yii::t('app', 'Tarikhsabt Karmand2'),
            'shahr' => Yii::t('app', 'Shahr'),
            'ostan' => Yii::t('app', 'Ostan'),
            'enableview' => Yii::t('app', 'Enableview'),
            'hoquq' => Yii::t('app', 'Hoquq'),
            'timeWork' => Yii::t('app', 'timeWork'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
