<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Karshenasnasb]].
 *
 * @see Karshenasnasb
 */
class KarshenasnasbQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Karshenasnasb[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Karshenasnasb|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
