<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $alert
 * @property string $img
 * @property string $tag
 * @property string $keyword
 * @property string $discription
 * @property string $category
 * @property string $enable
 * @property int $enableview
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'img', 'category'], 'required'],
            [['text'], 'string'],
            [[ 'enableview'], 'integer'],
            [['name', 'alert', 'img', 'tag', 'keyword', 'discription', 'category','enable'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'name' => 'عنوان',
            'text' => 'متن',
            'alert' => 'نوشته عکس',
            'img' => 'عکس',
            'tag' => 'تگ',
            'keyword' => 'کلمات کلیدی',
            'discription' => 'توضیحات',
            'category' => 'دسته بندی',
            'enable' => 'قابل نمایش',
            'enableview' => 'Enableview',
        ];
    }

    /**
     * @inheritdoc
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
