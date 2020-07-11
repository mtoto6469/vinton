<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pishnehad_enteqad".
 *
 * @property int $id
 * @property int $type_darkhast
 * @property int $vahede_marbute
 * @property string $title
 * @property string $date
 * @property string $date_farsi
 * @property string $text
 * @property string $result
 * @property string $time_result
 * @property int $id_parent
 * @property string $time_result_farsi
 * @property int $id_user
 */
class Pishnehadenteqad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pishnehad_enteqad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_darkhast', 'vahede_marbute', 'title', 'date', 'date_farsi', 'text', 'id_user'], 'required'],
            [['type_darkhast', 'vahede_marbute', 'id_parent', 'id_user'], 'integer'],
            [['date', 'time_result'], 'safe'],
            [['text', 'result'], 'string'],
            [['title', 'date_farsi', 'time_result_farsi'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_darkhast' => Yii::t('app', 'Type Darkhast'),
            'vahede_marbute' => Yii::t('app', 'Vahede Marbute'),
            'title' => Yii::t('app', 'Title'),
            'date' => Yii::t('app', 'Date'),
            'date_farsi' => Yii::t('app', 'Date Farsi'),
            'text' => Yii::t('app', 'Text'),
            'result' => Yii::t('app', 'Result'),
            'time_result' => Yii::t('app', 'Time Result'),
            'id_parent' => Yii::t('app', 'Id Parent'),
            'time_result_farsi' => Yii::t('app', 'Time Result Farsi'),
            'id_user' => Yii::t('app', 'Id User'),
        ];
    }

    /**
     * @inheritdoc
     * @return PishnehadEnteqadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PishnehadEnteqadQuery(get_called_class());
    }
}
