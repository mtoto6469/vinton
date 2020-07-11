<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_target".
 *
 * @property int $id
 * @property int $id_user
 * @property int $tagetforosh_mahane
 * @property string $datefa
 * @property string $date
 * @property string $sabtnam
 * @property string $name_markaz
 * @property string $ostan
 * @property string $shahr
 * @property int $targetforosh_ruzane
 * @property string $eshterak
 * @property string $type_eshterak
 * @property int $taeed
 * @property string $name_mantaqe
 * @property int $type_karshenas
 * @property string $ta_date_farsi
 * @property string $ta_date
 */
class TblTarget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_target';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'datefa', 'date', 'ta_date'], 'required'],
            [['id_user', 'tagetforosh_mahane', 'targetforosh_ruzane','taeed','type_karshenas',], 'integer'],
            [['date', 'ta_date'], 'safe'],
            [['datefa', 'ta_date_farsi','type_eshterak','name_markaz','ostan','shahr','name_mantaqe'], 'string', 'max' => 300],
            [['sabtnam'], 'string', 'max' => 400],
            [['eshterak'], 'string', 'max' => 600],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'id_user' => Yii::t('app', 'شناسه کاربر'),
            'tagetforosh_mahane' => Yii::t('app', 'تارگت فروش ماهانه'),
            'datefa' => Yii::t('app', 'تاریخ این ماه'),
            'date' => Yii::t('app', 'Date'),
            'sabtnam' => Yii::t('app', 'نوع خدمات'),
            'type_karshenas' => Yii::t('app', 'نوع کارشناس'),
            'targetforosh_ruzane' => Yii::t('app', 'تارگت فروش روزانه'),
            'eshterak' => Yii::t('app', 'eshterak'),
            'ta_date_farsi' => Yii::t('app', 'تا تاریخ'),
            'type_eshterak' => Yii::t('app', 'type_eshterak'),
            'ta_date' => Yii::t('app', 'Ta Date'),
            'taeed' => Yii::t('app', 'Taeed'),
            'name_markaz' => Yii::t('app', 'نام مرکز'),
            'ostan' => Yii::t('app', 'استان'),
            'shahr' => Yii::t('app', ' شهر'),
            'name_mantaqe' => Yii::t('app', ' منطقه'),
          
        ];
    }

    /**
     * @inheritdoc
     * @return TblTargetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblTargetQuery(get_called_class());
    }
}
