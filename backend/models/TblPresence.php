<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_presence".
 *
 * @property int $id
 * @property int $id_user
 * @property double $lat
 * @property double $lng
 * @property string $adress
 * @property string $date
 * @property string $dateIr
 * @property string $time
 * @property string $timeStamp
 * @property int $login
 * @property int $logout
 * @property string $dateEdit
 * @property int $enabel
 * @property int $enabel_view
 * @property string $sh1
 * @property string $sh2
 * @property string $sh3
 * @property string $sh4
 */
class TblPresence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_presence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'date', 'dateIr'], 'required'],
            [['id_user', 'login', 'logout', 'enabel', 'enabel_view'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['adress'], 'string'],
            [['date', 'time', 'timeStamp', 'dateEdit'], 'safe'],
            [['dateIr', 'sh1', 'sh2', 'sh3', 'sh4'], 'string', 'max' => 300],
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
            'lat' => Yii::t('app', 'Lat'),
            'lng' => Yii::t('app', 'Lng'),
            'adress' => Yii::t('app', 'Adress'),
            'date' => Yii::t('app', 'Date'),
            'dateIr' => Yii::t('app', 'Date Ir'),
            'time' => Yii::t('app', 'Time'),
            'timeStamp' => Yii::t('app', 'Time Stamp'),
            'login' => Yii::t('app', 'Login'),
            'logout' => Yii::t('app', 'Logout'),
            'dateEdit' => Yii::t('app', 'Date Edit'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'sh1' => Yii::t('app', 'Sh1'),
            'sh2' => Yii::t('app', 'Sh2'),
            'sh3' => Yii::t('app', 'Sh3'),
            'sh4' => Yii::t('app', 'Sh4'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblPresenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblPresenceQuery(get_called_class());
    }
}
