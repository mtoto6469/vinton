<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Chekfactor]].
 *
 * @see Chekfactor
 */
class FQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Chekfactor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Chekfactor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
