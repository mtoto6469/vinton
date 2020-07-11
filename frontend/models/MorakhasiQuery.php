<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Morakhasi]].
 *
 * @see Morakhasi
 */
class MorakhasiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Morakhasi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Morakhasi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
