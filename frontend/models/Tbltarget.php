<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_target".
 *
 * @property int $id
 * @property int $id_user
 * @property int $tagetforosh_mahane
 * @property int $taeed
 * @property string $datefa
 * @property string $date
 * @property string $sabtnam
 * @property string $name_markaz
 * @property string $name_mantaqe
 * @property int $targetforosh_ruzane
 * @property int $type_karshenas
 * @property string $eshterak
 * @property string $ostan
 * @property string $shahr
 * @property string $type_eshterak
 * @property string $ta_date_farsi
 * @property string $ta_date
 */
class Tbltarget extends \yii\db\ActiveRecord
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
            [['id_user', 'tagetforosh_mahane', 'targetforosh_ruzane','taeed','type_karshenas'], 'integer'],
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
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'tagetforosh_mahane' => Yii::t('app', 'Tagetforosh Mahane'),
            'datefa' => Yii::t('app', 'Datefa'),
            'date' => Yii::t('app', 'Date'),
            'sabtnam' => Yii::t('app', 'Sabtnam'),
            'targetforosh_ruzane' => Yii::t('app', 'Targetforosh Ruzane'),
            'eshterak' => Yii::t('app', 'eshterak'),
            'ta_date_farsi' => Yii::t('app', 'Ta Date Farsi'),
            'type_eshterak' => Yii::t('app', 'type eshterak'),
            'ta_date' => Yii::t('app', 'Ta Date'),
            'taeed' => Yii::t('app', 'Taeed'),
            'name_markaz' => Yii::t('app', 'name markaz'),
            'ostan' => Yii::t('app', 'ostan'),
            'shahr' => Yii::t('app', 'shahr'),
            'type_karshenas' => Yii::t('app', 'type_karshenas'),
            'name_mantaqe' => Yii::t('app', 'name_mantaqe'),

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
