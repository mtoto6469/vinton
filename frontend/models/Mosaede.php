<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "mosaede".
 *
 * @property int $id
 * @property int $id_user
 * @property int $darkhast
 * @property string $date
 * @property string $date_farsi
 * @property int $vaziyat
 * @property string $dalil
 */
class Mosaede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mosaede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'darkhast', 'date', 'date_farsi'], 'required'],
            [['id_user', 'darkhast', 'vaziyat'], 'integer'],
            [['date'], 'safe'],
            [['date_farsi', 'dalil'], 'string', 'max' => 400],
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
            'darkhast' => Yii::t('app', 'Darkhast'),
            'date' => Yii::t('app', 'Date'),
            'date_farsi' => Yii::t('app', 'Date Farsi'),
            'vaziyat' => Yii::t('app', 'Vaziyat'),
            'dalil' => Yii::t('app', 'Dalil'),
        ];
    }

    /**
     * @inheritdoc
     * @return MosaedeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MosaedeQuery(get_called_class());
    }
}
