<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_coordinates".
 *
 * @property integer $id
 * @property integer $id_range
 * @property double $lat
 * @property double $lng
 * @property integer $enabel
 * @property integer $enabel_view
 * @property string $sh1
 * @property string $sh2
 */
class TblCoordinates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_coordinates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_range', 'lat', 'lng', 'enabel', 'enabel_view'], 'required'],
            [['id_range', 'enabel', 'enabel_view'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['sh1', 'sh2'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه ',
            'id_range' => 'شناسه منطقه',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'enabel' => 'قابل نمایش',
            'enabel_view' => 'Enabel View',
            'sh1' => 'Sh1',
            'sh2' => 'Sh2',
        ];
    }

    /**
     * @inheritdoc
     * @return TblCoordinatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblCoordinatesQuery(get_called_class());
    }
}
