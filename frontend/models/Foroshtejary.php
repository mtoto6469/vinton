<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "forosh_tejary".
 *
 * @property int $id
 * @property int $id_user
 * @property string $type
 * @property string $eshterak
 * @property string $name_vahed_markaz
 * @property string $name_moteqazi
 * @property string $semat
 * @property string $cellphone
 * @property string $phone
 * @property int $tedade_markaz
 * @property string $masahat
 * @property int $lng
 * @property int $lat
 * @property int $tedade_tabaqat
 * @property int $tajhizat
 * @property string $kodum_service
 * @property int $ertefa
 * @property int $movafeq
 * @property string $discripton
 * @property string $datefa
 * @property string $date
 * @property string $price
 * @property string $shahr
 * @property int $mdf
 */
class Foroshtejary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forosh_tejary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'type', 'eshterak', 'name_vahed_markaz', 'name_moteqazi', 'semat', 'cellphone', 'phone', 'tedade_markaz', 'masahat', 'lng', 'lat', 'tedade_tabaqat', 'ertefa', 'datefa', 'date'], 'required'],
            [['id_user', 'cellphone', 'phone', 'tedade_markaz', 'lng', 'lat', 'tedade_tabaqat', 'tajhizat', 'ertefa', 'movafeq', 'mdf'], 'integer'],
            [['date'], 'safe'],
            [['type', 'eshterak', 'name_vahed_markaz', 'name_moteqazi', 'semat', 'masahat', 'datefa', 'price', 'shahr'], 'string', 'max' => 300],
            [['kodum_service'], 'string', 'max' => 11],
            [['discripton'], 'string', 'max' => 500],
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
            'type' => Yii::t('app', 'Type'),
            'eshterak' => Yii::t('app', 'Eshterak'),
            'name_vahed_markaz' => Yii::t('app', 'Name Vahed Markaz'),
            'name_moteqazi' => Yii::t('app', 'Name Moteqazi'),
            'semat' => Yii::t('app', 'Semat'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'phone' => Yii::t('app', 'Phone'),
            'tedade_markaz' => Yii::t('app', 'Tedade Markaz'),
            'masahat' => Yii::t('app', 'Masahat'),
            'lng' => Yii::t('app', 'Lng'),
            'lat' => Yii::t('app', 'Lat'),
            'tedade_tabaqat' => Yii::t('app', 'Tedade Tabaqat'),
            'tajhizat' => Yii::t('app', 'Tajhizat'),
            'kodum_service' => Yii::t('app', 'Kodum Service'),
            'ertefa' => Yii::t('app', 'Ertefa'),
            'movafeq' => Yii::t('app', 'Movafeq'),
            'discripton' => Yii::t('app', 'Discripton'),
            'datefa' => Yii::t('app', 'Datefa'),
            'date' => Yii::t('app', 'Date'),
            'price' => Yii::t('app', 'Price'),
            'shahr' => Yii::t('app', 'Shahr'),
            'mdf' => Yii::t('app', 'Mdf'),
        ];
    }

    /**
     * @inheritdoc
     * @return ForoshTejaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ForoshTejaryQuery(get_called_class());
    }
}
